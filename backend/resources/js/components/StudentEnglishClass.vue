<template>
    <div id="profile">
        <Header />
        <NavBar />
        <br/>
        <vs-row>
            <vs-col w="1">
                <div id="side">
                    <SideNav dashboard="StudentDashboard"/>
                </div>
            </vs-col>
            <vs-col w="1">
                    <b-nav vertical class="w-25" align="left" justified>
                        <b-button active to="#">Assignments</b-button>
                        <br />
                        <b-button active :to="'/people/' + $route.params.classId">People</b-button>
                        <br />
                        <b-button active :to="'/Announcement/' + $route.params.classId">Announcements</b-button>
                        <br />
                        <b-button active>Private Messages</b-button>
                    </b-nav>
            </vs-col>
            <vs-col w="9" v-if="assignment">
<!--                <div id="data">-->
<!--                    <h1>Assignments</h1>-->
<!--                    <br />-->
<!--                    <iframe src="https://i.simmer.io/@natkes/wordsearch" style="width:960px;height:600px"></iframe>-->
<!--                    <br/>-->
<!--                    <vs-button id="submit" @click="assignEnglish()">-->
<!--                        Submit Assignment-->
<!--                    </vs-button>-->
<!--                </div>-->
                <div>
                    <h1>Assignments</h1>
                    <h5>Please unscramble the words below</h5>
                    <div>
                        <div v-for="(item, index) in list" :key="index">
                            <vs-row>
                                <vs-col w="1">{{ item.shuffle }}</vs-col>
                                <vs-col w="4"><input v-model="item.guess" type="text" /></vs-col>
                            </vs-row>
                        </div>
                        <button @click="correctAnswer" type="submit">Pass</button>
                    </div>
                    <p>correct answers: {{answerCount}}</p>
                </div>
            </vs-col>
            <vs-col w="9" v-else>
                <div id="NoAssign">
                    <h1>Assignments</h1>
                    <h2>No assignments due!</h2>
                </div>
            </vs-col>
        </vs-row>
    </div>
</template>

<script>
import axios from 'axios';
import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";

export default {
  name: "StudentEnglishClass",
  components: {
    Header,
    NavBar,
    SideNav
  },
  data() {
    return {
      assignment: null,
        answer: "",
        list: [],
        answerCount: 0,
    }
  },
  created() {
    let self = this;
    axios.get('/api/assignments/1').then(function(response) {
        self.assignment = response.data.data
    },);
  },
    mounted() {
        var vm = this;
        vm.list = [
            { correct: "apple", shuffle: vm.shuffle("apple"), guess: "" },
            { correct: "banana", shuffle: vm.shuffle("banana"), guess: "" },
            { correct: "car", shuffle: vm.shuffle("car"), guess: "" },
        ];
    },
    methods:{
        assignEnglish() {
            let self = this;
            axios.put('/api/assignments/1')
                .then(function(response) {
                    alert('assignment submitted');
                    self.$session.set('published', false);
                })
                .catch(function(error) {
                    alert('error submitting assignment');
                });
            this.assignment=false;
        },
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

<style scoped>
#data {
  text-align: center;
}
</style>
