<template>
  <div class="app">
    <div v-if="status===0" class="loading">
      <van-loading size="36" />
    </div>
    <div v-else-if="status===1" class="preview-main">
      <div v-if="form.formStatus!=='2'">
        <div v-if="form.formStatus==='0'"  class="preview-warn">
          该问卷为临时问卷，只适合于预览时使用~
        </div>
        <h2 style="margin-top: 45px;color: white">{{form.title}}</h2>
        <div v-for="(items,index) in form.content" :key="index" class="preview-item">
          <van-radio-group  v-model="answer.content[index].options[0]" v-if="items.type === 'single-choose'" >

            <div class="preview-title">
              {{index+1}}、<span v-if="items.required" class="require">*</span>{{items.title}}({{questionType[items.type]}})
              <!--            <span v-if="items.required " class="require-info">选项必填</span>-->
            </div>
            <van-cell-group class="choose" v-for="(item,idx) in items.options"  :key="idx">
              <van-cell clickable  @click="saveOptions(item,index)" :title="item|title(idx)" >
                <van-radio slot="right-icon" :name="item" />
              </van-cell>
            </van-cell-group>
          </van-radio-group>

          <div v-else-if="items.type==='textarea'" class="textarea">
            <div class="preview-title">{{index+1}}、<span v-if="items.required" class="require">*</span>{{items.title}}</div>
            <van-field  v-model="answer.content[index].text" type="textarea" placeholder="请输入内容"
                        :rows="items.row" autosize
            />
          </div>

          <van-checkbox-group v-else v-model="answer.content[index].options">
            <div class="preview-title">{{index+1}}、<span v-if="items.required" class="require">*</span>{{items.title}}({{questionType[items.type]}})</div>
            <van-cell-group v-for="(item,idx) in items.options"  :key="idx">
              <van-cell clickable :title="item|title(idx)" @click="saveMulOptions('ref'+items.id,idx)">
                <van-checkbox slot="right-icon" :name="item" :ref="'ref'+items.id" />
              </van-cell>
            </van-cell-group>
          </van-checkbox-group>

        </div>
        <div class="btn">
          <van-button :disabled="form.formStatus==='0'" loading-text="提交中..." :loading="submitting"  @click="submitAnswer" type="primary" size="large">提交</van-button>
        </div>
        <div class="copyright">
          <div>Copyright © 2020 Fendy</div>
          <div>
            <span> The system is provided by <a href="">秋霁问卷</a> </span>
          </div>
        </div>
      </div>
      <div class="form-pause" v-else>
        <van-icon color="white" size="120px" name="warning-o" />
        <p>问卷已经停止访问</p>
      </div>


    </div>
    <div  class="finish" v-else>
      问卷到此结束，感谢你的参与！
    </div>
    <vue-scroll-progress-bar  height="5px" />
  </div>
</template>

<script>
  import Notify from "vant/lib/notify";
  import { VueScrollProgressBar } from '@guillaumebriday/vue-scroll-progress-bar'
  export default {
    components:{
      VueScrollProgressBar
    },
    data() {
      return {
        radio: '',
        form: {
          formStatus: '2',
          id: '',
          title: '',
          content:[],
        },
        status: 0,  //0加载中、1加载完成、2问卷已完成
        answer: {
          "content": []
        },
        questionType: {
          'single-choose': '单选',
          'mul-choose': '多选',
          'random-choose': '不定选',
          'textarea': '文本题'
        },
        submitting:false
      }
    },
    methods: {
      verify(index) {
        let item = this.answer.content[index];
        if (item.type!=='textarea')
          return this.answer.content[index].options !== null;
        else
          return this.answer.content[index].text !== null;
      },
      initAnswer(content) {
        return content.map((value)=>{
          let json = {};
          json.type = value.type;
          json.title = value.title;
          json.id= value.id;
          if (json.type!=='textarea')
            json.options = [];
          else
            json.text = '';
          return json;
        })
      },
      saveOptions(value,index) {
        this.answer.content[index].options=[value]
      },
      saveMulOptions(id,index) {
        this.$refs[id][index].toggle();
      },
      submitAnswer() {
        this.submitting=true;
        this.$http.post('submit_answer', this.answer)
          .then((res) => {
            this.submitting = false;
            if (res.data.code === 1) {
              this.submitting = false;
              Notify({ type: 'success', message: res.data.msg });
              this.status = 2;
            } else {
              this.submitting = false;
              Notify({ type: 'danger', message: res.data.msg });
            }
          }).catch((error) => {
          this.submitting = false;
          console.log(error)
        });
      }
    },
    created() {
      this.$http.post('s', {id: this.id}).then((res) => {
        this.form = res.data;
        this.status = 1;
        this.answer.id = res.data.id;
        this.answer.content=this.initAnswer(res.data.content)
      });
      this.form = this.id;
    },
    props: ['id'],
    filters: {
      title(item,index) {
        return String.fromCharCode(64 + parseInt(index+1))+'、'+item.text
      }
    }
  }
</script>

<style lang="scss" scoped>
  .form-pause {
    position: absolute;
    text-align: center;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .form-pause p {
    color: black;
    font-size: 20px;
  }
  .preview-warn {
    align-items: center;
    height: 40px;
    position: fixed;
    display: flex;
    top: 0;
    justify-content: center;
    z-index: 99;
    width: 100%;
    padding: 0 16px;
    color: #ed6a0c;
    font-size: 14px;
    line-height: 24px;
    background-color: #fffbe8;
  }
  .finish {
    font-size: larger;
    width: 100%;
    text-align: center;
    position: relative;
    top: 50px;
    margin: 50% 0;
    color: wheat;
  }

  .require-info {
    color: red;
    font-size: 12px;
  }

  .require {
    color: red;
  }

  h2 {
    text-align: center;
  }

  .preview-item {
    border-radius: 5px;
    background-color: #ffffff;
    padding: 10px 0;
    margin: 10px;
  }

  .preview-title {
    margin: 0;
    padding: 10px 16px 16px;
    color: rgba(69, 90, 100, 0.6);
    font-weight: normal;
    font-size: 14px;
    line-height: 16px;
    text-align: left;
  }

  .el-card {
    margin-bottom: 20px;
  }

  .choose {
    padding-left: 15px;
  }

  .loading {
    border-radius: 5px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }

  .btn {
    width: 80%;
    margin: 15px auto;
    text-align: center;
  }

  .copyright {
    padding: 32px 0 40px;
    text-align: center;
    color: rgba(0, 0, 0, 0.3);
    position: relative;
    z-index: 10;
    font-size: 14px;
  }
</style>
