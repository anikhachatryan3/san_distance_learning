<template>
  <div>
    <h1>Please unscramble the following words</h1>
    <div>
      <div v-for="(item, index) in list" :key="index">{{ item.shuffle }} <input v-model="item.guess" type="text" /></div>
      <button @click="correctAnswer" type="submit">Pass</button>
      <br />
      Correct answers: {{answerCount}}/3
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      answer: "",
      list: [],
      answerCount: 0,
    };
  },
  mounted() {
    var vm = this;
    vm.list = [
      { correct: "apple", shuffle: vm.shuffle("apple"), guess: "" },
      { correct: "banana", shuffle: vm.shuffle("banana"), guess: "" },
      { correct: "car", shuffle: vm.shuffle("car"), guess: "" },
    ];
  },
  methods: {
    correctAnswer() {
      var vm = this;
      vm.answerCount = this.list.filter((item) => {
        return item.correct === item.guess;
      }).length;
    },
    shuffle(propertyName) {
      var a = propertyName.split(""),
        n = a.length;

      for (var i = n - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var tmp = a[i];
        a[i] = a[j];
        a[j] = tmp;
      }
      return a.join("");
    },
  },
};
</script>
