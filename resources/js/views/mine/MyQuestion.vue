<template>
  <div class="survey">
    <div v-for="form in forms" class="survey-item">
      <div class="item-top item">
        <div class="item-title">{{form.title}}</div>
        <div class="item-info item">
          <div class="item-id item-pd">ID: {{form.question_id}}</div>
          <div :style="{'color':statusColor[form.status]}" class="item-status item-pd">{{statusText[form.status]}}</div>
          <div class="item-time item-pd">{{form.created_at | convertTime}}</div>
        </div>
      </div>
      <div class="item-bottom item">
        <div class="bt-left item">
          <div @click="edit(form.question_id,form.status)" class="bt-item">编辑问卷</div>
          <div class="bt-item">问卷设置</div>
          <div class="bt-item">统计分析</div>
        </div>
        <div class="bt-right item">
          <el-popconfirm v-if="form.status!=='1'" @onConfirm="release(form.question_id)" title="确定要发布吗？">
            <div slot="reference" class="bt-item">
              <span class="el-icon-s-promotion"></span>
              发布
            </div>
          </el-popconfirm>
          <el-popconfirm v-else-if="form.status==='1'" @onConfirm="release(form.question_id)" title="确定要暂停吗？">
            <div slot="reference" class="bt-item">
              <span class="el-icon-video-pause"></span>
              暂停
            </div>
          </el-popconfirm>
          <div v-if="form.status!=='1'" @click="preview(form.question_id)" class="bt-item">
            <span class="el-icon-view"></span>
            预览
          </div>
          <div  v-else-if="form.status==='1'" @click="preview(form.question_id)" class="bt-item">
            <span class="el-icon-share"></span>
            分享
          </div>
          <el-popconfirm @onConfirm="deleteForm(form.question_id)" title="确定要删除吗？">
            <div slot="reference" class="bt-item">
              <span class="iconfont icon-chushaixuanxiang"></span>
              删除
            </div>
          </el-popconfirm>
        </div>
      </div>
    </div>
    <el-dialog :modal-append-to-body="false" title="设备预览" :visible.sync="devicePreview">
      <div class="device-preview">
        <qriously :value="formUrl" :size="150" />
        <div class="form-url">
          <el-input  id="formUrl" :value="formUrl"></el-input>
          <div class="handle-url">
            <el-button @click="copyUrl">复 制</el-button>
            <el-button @click="openUrl">打 开</el-button>
          </div>
        </div>
      </div>
    </el-dialog>
  </div>
</template>

<script>
export default {
  data () {
    return {
      statusColor:{
        0: 'grey',
        1: 'green',
        2: '#FF9800',
      },
      statusText:{
        0: '未发布',
        1: '已发布',
        2: '已暂停',
      },
      devicePreview:false,
      forms:[],
      formUrl: ''
    }
  },
  methods:{
    edit(id,status) {
      if (status === '1') {
        this.$message.error('问卷已经投放，请先暂停问卷再编辑~');
      } else {
        this.$router.push({
          path: `/edit_form/${id}`,
        });
      }
    },
    release(id) {
      this.$http.post('release', {id: id}).then((res)=>{
        if (res.status === 200 && res.data.code === 1) {
          this.$message.success('操作成功');
          this.getForms();
        } else {
          this.$message.error('操作失败');
        }
      }).catch(reason => {this.$message.error('网络错误')})
    },
    preview(id) {
      this.formUrl = 'http://192.168.31.241:8081/s/' + id;
      this.devicePreview = true;
    },
    copyUrl() {
      const input = document.getElementById('formUrl');
      input.select(); // 选中文本
      if (document.execCommand('copy')) {
        this.$message.success('复制成功！');
      }
    },
    openUrl() {
      window.open(this.formUrl);
    },
    getForms() {
      this.$http.post('/get_forms').then((res)=>{
        if (res.status === 200 && res.data.code === 1) {
          this.forms = res.data.forms;
        }
      })
    },
    deleteForm(id){
      this.$http.post('delete_form', {id: id}).then((res) => {
        if (res.status === 200 && res.data.code === 1) {
          this.$message.success('删除成功');
          this.getForms();
        } else {
          this.$message.error('删除失败');
        }
      });
    }
  },
  created() {
    this.getForms();
  },
  filters:{
    convertTime(value) {
      return value.slice(0,16);
    }
  }
}
</script>

<style lang="scss" scoped>
  .survey {
    /*display: table-cell;*/
    text-align: center;
    /*vertical-align: middle;*/
  }
  .survey-item {
    display: inline-block;
    background: #fff;
    border-radius: 2px;
    margin-bottom: 20px;
    box-shadow: 0 0 4px 0 #F0F0F0;
    border: 1px solid #E6E6E6;
    padding: 20px;
    width: 780px;
  }
  .item {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .item-top {
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(0, 0, 0, .3);
  }
  .item-title {
    font-size: 18px;
  }
  .item-info {
    font-size: 12px;
    color: rgba(0, 0, 0, .8);
  }
  .bt-item {
    color: rgba(0, 0, 0, .6);
    padding: 0 10px;
    cursor: pointer;
  }
  .item-bottom {
    padding-top: 15px;
  }

  .item-pd {
    padding: 0 5px;
  }
  .item-status {
    line-height: 15px;
  }
  .form-url {
    width: 450px;
  }
  .handle-url {
    display: flex;
    justify-content: space-around;
    margin-top: 15px;
  }
  .device-preview {
    display: flex;
    justify-content: space-around;
  }

</style>
