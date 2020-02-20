<template>
  <van-checkbox-group v-model="result">
    <van-cell-group>
      <van-cell
        v-for="(item, index) in list"
        clickable
        :key="item"
        :title="`Checkbox ${item}`"
        @click="toggle(index)"
      >
        <van-checkbox slot="right-icon" :name="item" ref="checkboxes" />
      </van-cell>
    </van-cell-group>
  </van-checkbox-group>
<!--  <div>-->
<!--    {{100|toRMB('~')}}-->
<!--  </div>-->
</template>

<script>
  export default {
    data() {
      return {
        list: ['a', 'b'],
        result: []
      };
    },
    filters: {
      toRMB(amount, index) {
        return amount + index;
      }
    },
    methods: {
      toggle(index) {
        console.log(this.$refs);
        console.log(this.$refs.checkboxes);
        this.$refs.checkboxes[index].toggle();
      }
    }
  }
</script>
