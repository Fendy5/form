<template>
  <div class="app">
    <div v-if="loading" class="loading">
      <van-loading size="36" color="#1989fa"/>
    </div>
    <div v-else class="preview-main">
      <h2>{{form.title}}</h2>
      <div v-for="(items,index) in form.content" :key="index" class="preview-item">
        <van-checkbox-group v-model="answer" v-if="items.type !== 'textarea'" :max="2">
          <div class="preview-title">{{index+1}}、{{items.title}}({{questionType[items.type]}})</div>
          <van-cell-group class="choose" v-for="(item,idx) in items.select" clickable :key="idx">
            <van-cell :title="String.fromCharCode(64 + parseInt(idx+1))+'、'+item.value" clickable @click="radio = '2'">
              <van-radio slot="right-icon" name="2"/>
            </van-cell>
          </van-cell-group>
        </van-checkbox-group>
        <div v-else class="textarea">
          <div class="preview-title">{{index+1}}、{{items.title}}</div>
          <van-field
            :rows="5"
            autosize
            label="答案"
            type="textarea"
            placeholder="请输入答案"
          />
        </div>
      </div>
      <div class="btn">
        <van-button type="primary" size="large">提交</van-button>
      </div>
      <div class="copyright">
        <div>Copyright © 2020 Fendy</div>
        <div>
          <span> The system is provided by <a href="">秋霁问卷</a> </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        form: '',
        loading: true,
        answer: {
          "id": "WSAw",
          "content": [{
            "type": "radio",
            "id": "q-1-sIyL",
            "title": "题目",
            "required": true,
            "options": [
              {
                "id": "o-100-ABCD",
                "noRandom": false,
                "text": "<p>选项</p>\n"
              }
            ]
          }]
        },
        questionType: {
          'single-choose': '单选',
          'mul-choose': '多选',
          'random-choose': '不定选',
          'textarea': '文本类型'
        }
      }
    },
    created() {
      this.$http.post('s', {id: this.id}).then((res) => {
        this.form = res.data;
        this.loading = false;
      });
      this.form = this.id;
    },
    props: ['id'],
    methods: {
      toggle(index) {
        this.$refs.checkboxes[index].toggle();
      }
    }
  }
</script>

<style lang="scss" scoped>
  .preview-main {

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
