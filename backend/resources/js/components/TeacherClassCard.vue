<template>
  <div>
    <b-card-group deck>
      <div v-for="course in courses" :key="course.id">
        <b-card
          :title="course.name"
          :bg-variant="course.subject_bg_variant"
          :img-src="course.subject_img_src"
          img-alt="Image"
          img-top
          border-variant="dark"
          tag="article"
          style="max-width: 15rem;"
          class="mb-3"
        >
          <b-card-text></b-card-text>
          <b-button :href="'/' + course.subject_name.toLowerCase()" variant="primary">Open</b-button>
            <b-card-body>
                <b-button @click="Changeimage_vis=!Changeimage_vis">change image</b-button>
                <b-form-input v-if="Changeimage_vis" v-model="changedImage" placeholder="input url"></b-form-input>
                <b-button v-if="Changeimage_vis" @click="change_pic()">Change</b-button>
            </b-card-body>
          <template v-slot:footer>
            <small class="text-muted">{{ course.teacher_firstname + ' ' + course.teacher_lastname }}</small>
          </template>
        </b-card>
      </div>
    </b-card-group>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "ClassCard",
  data() {
    return {
        courses: [],
        Changeimage_vis: false,
        changedImage: ''
    }
  },
  created() {
    let m = this;
    axios.get('/api/courses')
      .then(function(response) {
        m.courses = response.data.data;
      });
  },
    methods:{
      change_pic: function()
      {
        console.log(this.changedImage);
        this.Changeimage_vis = false;
      }
    }
};
</script>
