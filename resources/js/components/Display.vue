<template>
<!--    <div class="preview-main">-->
<!--        <h2>{{form.title}}</h2>-->
<!--        <div v-for="(items,index) in form.content" :key="index" class="preview-item">-->
<!--            <van-radio-group v-if="items.type !== 'textarea'">-->
<!--                <div class="preview-title">{{index+1}}、{{items.title}}</div>-->
<!--                <van-cell-group class="choose" v-for="(item,idx) in items.select" :key="idx">-->
<!--                    <van-cell :title="String.fromCharCode(64 + parseInt(idx+1))+'、'+item.value" clickable @click="radio = '2'">-->
<!--                        <van-radio slot="right-icon" name="2" />-->
<!--                    </van-cell>-->
<!--                </van-cell-group>-->
<!--            </van-radio-group>-->

<!--            <div v-else class="textarea">-->
<!--                <div class="preview-title">{{index+1}}、{{items.title}}</div>-->
<!--                <van-field-->
<!--                    :rows="5"-->
<!--                    autosize-->
<!--                    label="答案"-->
<!--                    type="textarea"-->
<!--                    placeholder="请输入答案"-->
<!--                />-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
  <div>{{id}}</div>
</template>

<script>
export default {
  data () {
    return {
      form: {
        "id": 1,
        "title": "标题",
        "content": [
          {
            "type":"radio",
            "id":"q-1-sIyL",
            "title":"题目",
            "required":true,
            "options":[
              {
                "id":"o-100-ABCD",
                "noRandom":false,
                "text":"<p>选项</p>\n"
              },
            ],
          }
        ]
      },
      answer: {
        "id":"WSAw",
        "content": [{
          "type":"radio",
          "id":"q-1-sIyL",
          "title":"题目",
          "required":true,
          "options":[
            {
              "id":"o-100-ABCD",
              "noRandom":false,
              "text":"<p>选项</p>\n"
            }]
        }]
      }
    }
  },
    props: ['id'],
  methods () {

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
        border-radius: 10px;
        background-color: #ffffff;
        margin: 10px 0;
    }
    .preview-title {
        margin: 0;
        padding: 32px 16px 16px;
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
</style>
