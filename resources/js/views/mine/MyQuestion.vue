<template>
    <div class="survey">
      <div v-for="form in forms" class="survey-item">
          <div class="item-top item">
            <div class="item-title">{{form.title}}</div>
            <div class="item-info item">
              <!--          <div>答卷: <span class="answer">{{form.answer}}</span></div>-->
              <div class="item-id item-pd">ID: {{form.question_id}}</div>
              <div :style="{'color':statusColor[form.status]}" class="item-status item-pd">{{statusText[form.status]}}
              </div>
              <div class="item-time item-pd">{{form.created_at | convertTime}}</div>
            </div>
          </div>
          <div class="item-bottom item">
            <div class="bt-left item">
              <div @click="edit(form.question_id,form.status)" class="bt-item">编辑问卷</div>
              <div class="bt-item">问卷设置</div>
              <div @click="statistic(form.question_id)" class="bt-item">统计分析</div>
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
              <div v-else-if="form.status==='1'" @click="preview(form.question_id)" class="bt-item">
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
      <div v-if="forms.length===0">
        <svg t="1588229925690" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="8360" width="256" height="256"><path d="M778.345093 355.345734c-6.568313-9.195638-17.077614-15.10712-28.243746-17.077613l-135.96408-19.704939c-1.313663 0-1.970494-0.656831-2.627325-1.970494l-61.085311-123.484285c-3.940988-8.538807-11.166132-15.10712-19.704939-19.704939-10.509301-5.25465-21.675433-5.911482-32.841565-1.970494-11.166132 3.940988-19.704939 11.166132-24.959589 21.675433l-61.085312 123.484285c-0.656831 0.656831-1.313663 1.313663-2.627325 1.970494l-135.964079 19.704939c-9.195638 1.313663-17.734445 5.911482-24.302758 12.479794-16.420783 17.077614-16.420783 44.007697 0.656831 61.085311l98.524695 95.897371c0.656831 0.656831 1.313663 1.970494 0.656831 2.627325l-22.989095 135.964079c-1.313663 9.195638 0 19.048108 4.597819 26.930084 11.166132 21.018602 36.782553 28.900577 57.801155 18.391276l122.170622-64.369467c0.656831-0.656831 1.970494-0.656831 2.627325 0l122.170622 64.369467c5.911482 3.284157 13.136626 4.597819 19.704939 4.597819 2.627325 0 4.597819 0 7.225145-0.656831 23.645927-3.940988 39.409878-26.273252 34.812059-49.919179l-22.989096-135.96408c0-1.313663 0-1.970494 0.656831-2.627325l98.524696-95.89737c6.568313-6.568313 11.166132-15.10712 12.479794-24.302758 2.627325-11.166132 0-22.332264-7.225144-31.527903z m-1.313663 30.871072c-1.313663 7.225144-4.597819 13.793457-9.852469 19.048107l-98.524695 95.897371c-3.284157 3.284157-4.597819 7.225144-3.940988 11.822963l22.989095 135.964079c3.284157 17.734445-9.195638 35.46889-26.930083 38.096216-7.225144 1.313663-14.450289 0-21.018602-3.284156l-122.170622-64.369468c-1.313663-1.313663-3.284157-1.970494-5.25465-1.970494-1.970494 0-3.940988 0.656831-5.911482 1.313663L384.246312 683.104554c-16.420783 8.538807-36.125722 1.970494-44.664529-13.793457-3.284157-6.568313-4.597819-13.793457-3.284156-21.018602L359.286722 512.328416c0.656831-3.940988-0.656831-8.538807-3.940988-11.822964l-98.524695-95.89737c-13.136626-12.479795-13.136626-33.498396-0.656831-46.635022 5.25465-5.25465 11.822963-8.538807 19.048108-9.85247l135.964079-19.704939c3.940988-0.656831 7.881976-3.284157 9.85247-7.225144l61.085311-123.484285c3.940988-7.881976 10.509301-13.793457 19.048108-16.420783 8.538807-2.627325 17.077614-1.970494 24.959589 1.970494 6.568313 3.284157 11.822963 8.538807 15.10712 15.10712L602.314304 321.847338c1.970494 3.940988 5.25465 6.568313 9.85247 7.225144l135.964079 19.704939c8.538807 1.313663 16.420783 5.911482 21.675433 13.136626 5.911482 6.568313 7.881976 15.10712 7.225144 24.302759z" fill="#111111" p-id="8361"></path><path d="M428.91084 438.106479c-3.284157 0-5.25465-2.627325-4.597819-5.254651 8.538807-80.133419 70.937781-75.5356 71.594612-75.5356 2.627325 0 4.597819 2.627325 4.597819 5.254651s-2.627325 4.597819-5.25465 4.597819c-1.970494 0-53.203335-3.284157-61.085311 66.996793 0 1.970494-2.627325 3.940988-5.254651 3.940988zM782.286081 769.149455H225.949968c-2.627325 0-5.25465-1.970494-5.25465-5.254651s1.970494-5.25465 5.25465-5.25465h556.336113c2.627325 0 5.25465 1.970494 5.25465 5.25465s-2.627325 5.25465-5.25465 5.254651zM967.512508 813.813983h-276.525978c-2.627325 0-5.25465-1.970494-5.254651-5.25465s1.970494-5.25465 5.254651-5.254651h276.525978c2.627325 0 5.25465 1.970494 5.25465 5.254651s-2.627325 5.25465-5.25465 5.25465zM664.713278 813.813983h-38.753047c-2.627325 0-5.25465-1.970494-5.25465-5.25465s1.970494-5.25465 5.25465-5.254651h38.753047c2.627325 0 5.25465 1.970494 5.25465 5.254651s-2.627325 5.25465-5.25465 5.25465zM599.030148 813.813983H33.498396c-2.627325 0-5.25465-1.970494-5.25465-5.25465s1.970494-5.25465 5.25465-5.254651h566.188583c2.627325 0 5.25465 1.970494 5.25465 5.254651s-2.627325 5.25465-5.911481 5.25465zM151.728031 377.677999c-15.10712 0-26.930083 11.822963-26.930084 26.930083s11.822963 26.930083 26.930084 26.930083 26.930083-11.822963 26.930083-26.930083c0-14.450289-11.822963-26.930083-26.930083-26.930083z m0 44.007697c-9.195638 0-17.077614-7.881976-17.077614-17.077614 0-9.195638 7.881976-17.077614 17.077614-17.077614 9.195638 0 17.077614 7.881976 17.077614 17.077614 0 9.195638-7.881976 17.077614-17.077614 17.077614zM835.489416 622.676074c-16.420783 0-29.557409 13.136626-29.557408 29.557409s13.136626 29.557409 29.557408 29.557409 29.557409-13.136626 29.557409-29.557409-13.136626-29.557409-29.557409-29.557409z m0 49.262348c-11.166132 0-19.704939-9.195638-19.704939-19.704939s9.195638-19.704939 19.704939-19.704939 19.704939 9.195638 19.704939 19.704939-8.538807 19.704939-19.704939 19.704939zM848.626042 482.114176c-1.313663 0-2.627325-0.656831-3.940987-1.313663-1.970494-1.970494-1.970494-5.25465 0.656831-7.225144l23.645927-21.018602c1.970494-1.313663 4.597819-1.970494 6.568313 0l19.704939 16.420783 21.018601-16.420783c1.970494-1.313663 4.597819-1.313663 6.568313 0l21.675433 21.018602c1.970494 1.970494 1.970494 5.25465 0 7.225144-1.970494 1.970494-5.25465 1.970494-7.225144 0l-19.048108-18.391276-20.36177 16.420782c-1.970494 1.313663-4.597819 1.313663-6.568313 0l-19.704939-16.420782-20.36177 18.391276c0 0.656831-1.313663 1.313663-2.627326 1.313663zM59.114817 610.853111c-1.313663 0-2.627325-0.656831-3.940988-1.313663-1.970494-1.970494-1.970494-5.25465 0.656832-7.225144l23.645927-21.018602c1.970494-1.313663 4.597819-1.970494 6.568313 0l19.704939 16.420783 21.018601-16.420783c1.970494-1.313663 4.597819-1.313663 6.568313 0l21.675433 21.018602c1.970494 1.970494 1.970494 5.25465 0 7.225144-1.970494 1.970494-5.25465 1.970494-7.225144 0L129.395767 591.148172l-20.361771 16.420782c-1.970494 1.313663-4.597819 1.313663-5.911482 0l-19.704939-16.420782-20.36177 18.391276c-1.313663 0.656831-2.627325 1.313663-3.940988 1.313663z" fill="#111111" p-id="8362"></path></svg>
        <h3>没有相关数据~</h3>
      </div>
      <el-dialog :modal-append-to-body="false" title="设备预览" :visible.sync="devicePreview">
        <div class="device-preview">
          <qriously :value="formUrl" :size="150"/>
          <div class="form-url">
            <el-input id="formUrl" :value="formUrl"></el-input>
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
    data() {
      return {
        statusColor: {
          0: 'grey',
          1: 'green',
          2: '#FF9800',
        },
        statusText: {
          0: '未发布',
          1: '已发布',
          2: '已暂停',
        },
        devicePreview: false,
        forms: [],
        formUrl: ''
      }
    },
    methods: {
      statistic(id) {
        this.$router.push({
          path: `/statistic/${id}`,
        });
      },
      edit(id, status) {
        if (status === '1') {
          this.$message.error('问卷已经投放，请先暂停问卷再编辑~');
        } else {
          this.$router.push({
            path: `/edit_form/${id}`,
          });
        }
      },
      release(id) {
        this.$http.post('release', {id: id}).then((res) => {
          if (res.status === 200 && res.data.code === 1) {
            this.$message.success('操作成功');
            this.getForms();
          } else {
            this.$message.error('操作失败');
          }
        }).catch(reason => {
          this.$message.error('网络错误')
        })
      },
      preview(id) {
        this.formUrl = 'http://192.168.1.102:8081/s/' + id;
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
        this.$http.post('/get_forms').then((res) => {
          if (res.status === 200 && res.data.code === 1) {
            this.forms = res.data.forms;
          }
        })
      },
      deleteForm(id) {
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
    filters: {
      convertTime(value) {
        return value.slice(0, 16);
      }
    }
  }
</script>

<style lang="scss" scoped>
  .answer {
    color: orange;
  }

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
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    width: 340px;
    padding-left: 10px;
    text-align: left;
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

  .bt-item:hover {
    color: #3182bd;
  }

  .item-bottom {
    padding-top: 15px;
  }

  .item-pd {
    padding: 0 10px;
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
