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
          <div class="preview-handle">
            <el-button @click="saveDate">设备预览</el-button>
            <el-button @click="release" type="primary">保存并投放</el-button>
          </div>
        </el-col>
        <el-col :span="12">
            <div id="main">
                <el-form :model="form" ref="form" label-width="100px" class="demo-ruleForm">
                    <el-card>
                        <el-form-item placeholder="请输入标题" :rules="rules.title" label="标题" prop="title">
                            <el-input v-model="form.title"></el-input>
                        </el-form-item>
                    </el-card>
                    <div id="content">
                      <draggable :component-data="getComponentData()" :list="form.content">
                        <div v-for="(items,index) in form.content">
                            <el-card v-if="items.type==='single-choose'">
                                <el-form-item
                                    :label="'单选题目'">
                                    <el-input v-model="items.title">
                                    </el-input>
                                </el-form-item>
                                <el-form-item
                                    :label="'选项'"
                                    v-for="item in items.options"
                                    :key="item.id">
                                    <el-input v-model="item.text">
                                        <template slot="append"><i @click="removeChoose(item,index)" class="el-icon-delete"></i></template>
                                    </el-input>
                                </el-form-item>
                                <el-form-item>
                                  <el-checkbox v-model="items.required" >必填</el-checkbox>
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
                                    v-for="item in items.options"
                                    :key="item.id">
                                    <el-input v-model="item.text">
                                        <template slot="append"><i @click="removeChoose(item,index)" class="el-icon-delete"></i></template>
                                    </el-input>
                                </el-form-item>
                              <el-form-item>
                                <el-checkbox v-model="items.required" >必填</el-checkbox>
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
                                    v-for="item in items.options"
                                    :key="item.id">
                                    <el-input v-model="item.text">
                                        <template slot="append"><i @click="removeChoose(item,index)" class="el-icon-delete"></i></template>
                                    </el-input>
                                </el-form-item>
                              <el-form-item>
                                <el-checkbox v-model="items.required" >必填</el-checkbox>
                              </el-form-item>
                                <el-form-item>
                                    <el-button @click="addChoose(index)" type="primary">添加选项</el-button>
                                    <el-button @click="removeQuestion(items,index)" type="danger">删除题目</el-button>
                                </el-form-item>
                            </el-card>
                            <el-card v-if="items.type==='textarea'">
                                <el-form-item
                                    :label="'文本题'">
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
                                <el-checkbox v-model="items.required" >必填</el-checkbox>
                              </el-form-item>
                                <el-form-item>
                                    <el-button @click="removeQuestion(items,index)" type="danger">删除题目</el-button>
                                </el-form-item>
                            </el-card>
                        </div>
                      </draggable>
                    </div>
                </el-form>
            </div>
        </el-col>
        <el-col :span="6">
            <div class="preview">
              <div class="iphone">
                <div class="iphone-top">
                  <span class="camera"></span>
                  <span class="sensor"></span>
                  <span class="speaker"></span>
                </div>
                <div class="top-bar"></div>
                <div class="iphone-screen">
                  <h2>{{form.title}}</h2>
                  <div v-for="(items,index) in form.content" :key="index" class="preview-item">
                    <van-radio-group v-if="items.type !== 'textarea'">
                      <div class="preview-title">{{index+1}}、{{items.title}}</div>
                      <van-cell-group  v-for="(item,idx) in items.options" :key="idx">
                        <van-cell :title="String.fromCharCode(64 + parseInt(idx+1))+'、'+item.text" clickable @click="radio = '2'">
                          <van-radio slot="right-icon" name="2" />
                        </van-cell>
                      </van-cell-group>
                    </van-radio-group>
                    <div v-else class="textarea">
                      <div class="preview-title">{{index+1}}、{{items.title}}</div>
                      <van-field
                        :rows="5"
                        autosize
                        type="textarea"
                        placeholder="请输入答案"
                      />
                    </div>
                  </div>

                </div>
                <div class="buttons">
                  <span class="on-off"></span>
                  <span class="sleep"></span>
                  <span class="up"></span>
                  <span class="down"></span>
                </div>
                <div class="bottom-bar"></div>
                <div class="iphone-bottom">
                  <span></span>
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
        </el-col>
    </el-row>
</template>

<script>
import draggable from 'vuedraggable'
export default {
  components:{
    draggable
  },
  data () {
      return {
        formUrl: 'http://192.168.1.102:8081/s/7yc4t4HDxJ4GxLTI',
        devicePreview: false,
        form: {
            title: '',
            content: []
        },
        rules: {
            title: [
                { required: true, message: '请输入标题', trigger: 'blur' },
                { min: 1, max: 32, message: '长度在 3 到 5 个字符', trigger: 'blur' }
            ],
            question: [
                { required: true, message: '请输入题目', trigger: 'blur' },
                { min: 3, max: 5, message: '长度在 3 到 5 个字符', trigger: 'blur' }
            ],
        }
      };
  },
  methods: {
    handleChange() {
      console.log('changed');
    },
    inputChanged(value) {
      this.activeNames = value;
    },
    getComponentData() {
      return {
        on: {
          change: this.handleChange,
          input: this.inputChanged
        },
        attrs:{
          wrap: true
        },
        props: {
          value: this.activeNames
        }
      };
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
    formRef () {
        this.$refs.formRef.resetFields()
    },
    simpleChoose() {
        this.form.content.push({
            "type": "single-choose",
            "id": this.createRandomStr(),
            "title": "",
            "required": true,
            "options": [
                {
                    "id": Date.now().toString()+1,
                    "text": ""
                },
                {
                    "id": Date.now().toString()+2,
                    "text": ""
                }
            ]
        },);
    },
    mulChoose() {
      this.form.content.push({
        "id": this.createRandomStr(),
        "type": "mul-choose",
        "title": "",
        "required": true,
        "options": [
            {
                "id": Date.now().toString()+1,
                "text": ""
            },
            {
                "id": Date.now().toString()+2,
                "text": ""
            },
            {
                "id": Date.now().toString()+3,
                "text": ""
            }
        ]
    },);
    },
    textarea() {
        this.form.content.push({
          "type": "textarea",
          "required": true,
          "title": "",
          "row": "2",
          "id": this.createRandomStr(),
        })
    },
    randomChoose() {
        this.form.content.push({
          "type": "random-choose",
          "id": this.createRandomStr(),
          "title": "",
          "required": true,
          "options": [
              {
                  "id": Date.now().toString()+1,
                  "text": ""
              },
              {
                  "id": Date.now().toString()+2,
                  "text": ""
              },
              {
                  "id": Date.now().toString()+3,
                  "text": ""
              }
            ]
        },);
    },
    addChoose(index) {
        this.form.content[index].options.push({
            text: '',
            id: Date.now().toString()
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
        let currentIndex = this.form.content[index].options.indexOf(item);
        if (currentIndex !== -1) {
            this.form.content[index].options.splice(currentIndex, 1);
        }
    },
    saveDate() {
      this.$http.post('save_data', this.form).then((res => {
        if (res.status !== 200) return this.$message.error('提交失败');
        this.formUrl = `http://192.168.1.102:8081/s/${res.data.formUrl}`;
      }));
      this.devicePreview = true;
    },
    createRandomStr() {
      return Math.random().toString(36).slice(-8)
    }
  }
}
</script>

<style lang="scss" scoped>
  h2 {
    text-align: center;
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
  .create {
      /*position: relative;*/
  }
  .preview {
      position: fixed;
      width: 20%;
      margin: 380px -80px;
      padding: 46px 20px 20px;
  }
  .preview-item {
      border-radius: 15px;
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
  .iphone {
    box-shadow: inset 0 0 3px 0 rgba(0, 0, 0, 0.2), 0 0 0 1px #999, 0 0 30px 0px rgba(0, 0, 0, 0.7);
    border: 5px solid #d9dbdc;
    background: #f8f8f8;
    padding: 15px;
    border-radius: 50px;
    height: 877px;
    width: 423px;
    position: relative;
    margin: 30px auto;
    -webkit-transform: scale(0.8);
    transform: scale(0.8);
  }
  .iphone-top {
    padding: 5px 110px 40px;
    position: relative;
  }
  .iphone-top .speaker {
    display: block;
    width: 70px;
    height: 6px;
    margin: 0 auto;
    border-radius: 6px;
    background: #292728;
  }
  .iphone-top .camera {
    display: block;
    margin: 0 auto;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    margin-bottom: 13px;
    background: #333;
  }
  .iphone-top .sensor {
    display: block;
    width: 15px;
    height: 15px;
    float: left;
    background: #333;
    margin-top: -5px;
    border-radius: 50%;
  }
  .preview-handle {
    margin: 300px 0px;
    display: flex;
    flex-direction: column;
    position: fixed;
  }
  .preview-handle > .el-button {
    margin: 10px 0;
  }
</style>
