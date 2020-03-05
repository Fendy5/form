<template>
  <draggable :list="list" :component-data="getComponentData()">
    <el-card  v-for="e in list" :key="e.name" shadow="always">
      {{e.name}}
    </el-card>
  </draggable>
</template>

<script>
import draggable from 'vuedraggable'
export default {
  components:{
    draggable
  },
  data () {
    return {
      list:[
        {
          'title': 't1',
          'name': 'n1'
        },{
          'title': 't2',
          'name': 'n2'
        },{
          'title': 't3',
          'name': 'n3'
        }
      ]
    }
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
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
