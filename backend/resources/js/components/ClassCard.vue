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
          <b-button :href="'/student' + course.subject_name.toLowerCase() + 'class'" variant="primary">Open</b-button>
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
    }
  },
  created() {
    let m = this;
    axios.get('/api/courses')
      .then(function(response) {
        m.courses = response.data.data;
      });
  },
};
</script>
