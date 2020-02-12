<template>
    <el-row class="create" :gutter="25">
        <el-col :span="6">
            <div style="visibility: hidden">1</div>
            <div class="aside">
                <div @click="simpleChoose" class="choose-item">单选题</div>
                <div @click="mulChoose" class="choose-item">多选题</div>
                <div @click="randomChoose" class="choose-item">不定选</div>
                <div @click="textarea" class="choose-item">文本框</div>
            </div>

        </el-col>
        <el-col :span="12">
            <div id="main">
                <el-form :model="form" ref="form" label-width="100px" class="demo-ruleForm">
                    <el-card>
                        <el-form-item :rules="rules.title" label="标题" prop="title">
                            <el-input v-model="form.title"></el-input>
                        </el-form-item>
                    </el-card>
                    <div id="content">
                        <div v-for="(items,index) in form.content">
                            <el-card v-if="items.type==='single-choose'">
                                <el-form-item
                                    :label="'单选题目'">
                                    <el-input v-model="items.title">
                                    </el-input>
                                </el-form-item>
                                <el-form-item
                                    :label="'选项'"
                                    v-for="item in items.select"
                                    :key="item.key">
                                    <el-input v-model="item.value">
                                        <template slot="append"><i @click="removeChoose(item,index)" class="el-icon-delete"></i></template>
                                    </el-input>
                                </el-form-item>
                                <el-form-item>
                                    <el-button @click="addChoose(index)" type="primary">添加选项</el-button>
                                    <el-button @click="removeQuestion(items,index)" type="danger">删除题目</el-button>
                                </el-form-item>
                            </el-card>
                            <el-card v-if="items.type==='mul-choose'">
                                <el-form-item
                                    :label="'多选标题'">
                                    <el-input v-model="items.title">
                                    </el-input>
                                </el-form-item>
                                <el-form-item
                                    :label="'选项'"
                                    v-for="item in items.select"
                                    :key="item.key">
                                    <el-input v-model="item.value">
                                        <template slot="append"><i @click="removeChoose(item,index)" class="el-icon-delete"></i></template>
                                    </el-input>
                                </el-form-item>
                                <el-form-item>
                                    <el-button @click="addChoose(index)" type="primary">添加选项</el-button>
                                    <el-button @click="removeQuestion(items,index)" type="danger">删除题目</el-button>
                                </el-form-item>
                            </el-card>
                            <el-card v-if="items.type==='random-choose'">
                                <el-form-item
                                    :label="'不定选项标题'">
                                    <el-input v-model="items.title">
                                    </el-input>
                                </el-form-item>
                                <el-form-item
                                    :label="'选项'"
                                    v-for="item in items.select"
                                    :key="item.key">
                                    <el-input v-model="item.value">
                                        <template slot="append"><i @click="removeChoose(item,index)" class="el-icon-delete"></i></template>
                                    </el-input>
                                </el-form-item>
                                <el-form-item>
                                    <el-button @click="addChoose(index)" type="primary">添加选项</el-button>
                                    <el-button @click="removeQuestion(items,index)" type="danger">删除题目</el-button>
                                </el-form-item>
                            </el-card>
                            <el-card v-if="items.type==='textarea'">
                                <el-form-item
                                    :label="'文本域标题'">
                                    <el-input v-model="form.content[index].title">
                                    </el-input>
                                </el-form-item>
                                <el-form-item
                                    prop="row"
                                    type="number"
                                    :label="'行数'">
                                    <el-input v-model="form.content[index].row">
                                    </el-input>
                                </el-form-item>
                                <el-form-item>
                                    <el-button @click="removeQuestion(items,index)" type="danger">删除题目</el-button>
                                </el-form-item>
                            </el-card>
                        </div>
                    </div>
                </el-form>
            </div>
        </el-col>
        <el-col :span="6">
            <div class="preview">
                <div class="preview-main">
                    <h2>{{form.title}}</h2>
                    <div v-for="(items,index) in form.content" :key="index" class="preview-item">
                        <van-radio-group v-if="items.type !== 'textarea'">
                            <div class="preview-title">{{index+1}}、{{items.title}}</div>
                            <van-cell-group  v-for="(item,idx) in items.select" :key="idx">
                                <van-cell :title="String.fromCharCode(64 + parseInt(idx+1))+'、'+item.value" clickable @click="radio = '2'">
                                    <van-radio slot="right-icon" name="2" />
                                </van-cell>
                            </van-cell-group>
                        </van-radio-group>

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
                </div>
                    <div style="margin: 20px 0;text-align: center">
                        <el-button>预览</el-button>
                        <el-button type="primary">保存并发放</el-button>
                </div>
            </div>
        </el-col>
    </el-row>
</template>

<script>
export default {
  data () {
      return {
          form: {
              title: '调查问卷的内容~',
              content: [{"type":"single-choose","title":"你喜欢我吗？","select":[{"key":"15810542257241","value":"不喜欢"},{"key":"15810542257242","value":"喜欢鸭"},{"key":"15810542257243","value":"说不准"},{"value":"爱你个大头鬼","key":"1581054257149"}]},{"type":"random-choose","title":"不定选题目","select":[{"key":"15810542704111","value":""},{"key":"15810542704112","value":""},{"key":"15810542704113","value":""}]},{"type":"textarea","title":"文本类型题目","row":"5"},{"type":"random-choose","title":"不定选题目","select":[{"key":"15810542767771","value":""},{"key":"15810542767772","value":""},{"key":"15810542767773","value":""}]}]
          },
          rules: {
              title: [
                  { required: true, message: '请输入标题', trigger: 'blur' },
                  { min: 3, max: 5, message: '长度在 3 到 5 个字符', trigger: 'blur' }
              ],
              question: [
                  { required: true, message: '请输入题目', trigger: 'blur' },
                  { min: 3, max: 5, message: '长度在 3 到 5 个字符', trigger: 'blur' }
              ],
          }
      };
  },
    methods: {
        formRef () {
            this.$refs.formRef.resetFields()
        },
        simpleChoose() {
            this.form.content.push({
                "type": "single-choose",
                "title": "单题目",
                "select": [
                    {
                        "key": Date.now().toString()+1,
                        "value": ""
                    },
                    {
                        "key": Date.now().toString()+2,
                        "value": ""
                    },
                    {
                        "key": Date.now().toString()+3,
                        "value": ""
                    }
                ]
            },);
        },
        mulChoose() {
            this.form.content.push({
                "type": "mul-choose",
                "title": "多选题目",
                "select": [
                    {
                        "key": Date.now().toString()+1,
                        "value": ""
                    },
                    {
                        "key": Date.now().toString()+2,
                        "value": ""
                    },
                    {
                        "key": Date.now().toString()+3,
                        "value": ""
                    }
                ]
            },);
        },
        textarea() {
            this.form.content.push({
                "type": "textarea",
                "title": "文本类型题目",
                "row": "2"
            })
        },
        randomChoose() {
            this.form.content.push({
                "type": "random-choose",
                "title": "不定选题目",
                "select": [
                    {
                        "key": Date.now().toString()+1,
                        "value": ""
                    },
                    {
                        "key": Date.now().toString()+2,
                        "value": ""
                    },
                    {
                        "key": Date.now().toString()+3,
                        "value": ""
                    }
                ]
            },);
        },
        addChoose(index) {
            this.form.content[index].select.push({
                value: '',
                key: Date.now().toString()
            })
        },
        removeQuestion(item,index) {
            let currentIndex = this.form.content.indexOf(item);
            if (currentIndex !== -1) {
                this.form.content.splice(currentIndex, 1);
            }
        },
        removeChoose(item,index) {
            console.log("index:" + index);
            console.log(item);
            let currentIndex = this.form.content[index].select.indexOf(item);
            if (currentIndex !== -1) {
                this.form.content[index].select.splice(currentIndex, 1);
            }
        }
    }
}
</script>

<style lang="scss" scoped>
    .create {
        /*position: relative;*/
    }
    .preview-main {
        box-sizing: border-box;
        min-height: 70vh;
        border-radius: 20px;
        height: 76px;
        line-height: 56px;
        text-align: center;
        padding: 10px;
        overflow:scroll;
        -moz-box-shadow:0px 1px 10px #8F69DB; -webkit-box-shadow:0px 1px 10px #8F69DB; box-shadow:0px 1px 10px #8F69DB;
    }
    .preview {
        position: fixed;
        width: 20%;
        margin: 370px -50px;
        padding: 46px 20px 20px;
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
    .input {
        display: flex !important;
        align-items: center !important;
    }
    .el-icon-delete {
        color: red;
        margin-left: 5px;
    }
    #main {
        width: 70%;
    }
    .aside {
        position: fixed;
        box-sizing: border-box;
        width: 200px;
        border-radius: 20px;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        font-size: 16px;
        top: 100px;
        text-align: center;
    }
    .choose-item {
        padding: 15px;
        cursor: pointer;
        transition: border-color .3s,background-color .3s,color .3s;
        box-sizing: border-box;
        font-size: 14px;
        color: #303133;
    }
    .choose-item:hover {
        background-color: #a8c5ff;
    }
</style>
