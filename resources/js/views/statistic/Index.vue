<template>
  <el-row :gutter="20">
    <h2 style="text-align: center">{{title}}</h2>
    <el-col :span="18" :offset="3">
     <bar-chart></bar-chart>
      <el-card style="width: 100%">
        <el-table :data="contents" style="width: 100%" height="250">
          <el-table-column :key="item.id" :prop="item.id" v-for="item in form" fixed  :label="item.title" >
          </el-table-column>
        </el-table>
      </el-card>
    </el-col>
  </el-row>
</template>

<script>
  // import { Bar } from 'vue-chartjs'
  export default {

    methods:{
      indexMethod(index) {
        return index * 2;
      }
    },
    mounted () {
      // Overwriting base render method with actual data.
      this.renderChart({
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [
          {
            label: 'GitHub Commits',
            backgroundColor: '#f87979',
            data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
          }
        ]
      })
    },
  data () {
    return {
      renderChart: '',
      title:'',
      form: [],
      contents:[
        {
          'g5lf4agi': '1',
          '7joo1if4': '2',
          'ubf5dqok': '3'
        }
      ]
    }
  },
  created() {
    this.$http.post('statistic', {id: this.$route.params.id}).then((res) => {
      if (res.status === 200 && res.data.code === 1) {
        this.contents = res.data.content;
        this.title = res.data.title;
        this.form = res.data.form;
      } else {
        this.$message.error('获取失败');
      }
    }).catch(reason => {
      this.$message.error('网络错误')
    })
  }
}
</script>

<style lang="scss" scoped>
.st-table {
  margin: 24px;
}
</style>
