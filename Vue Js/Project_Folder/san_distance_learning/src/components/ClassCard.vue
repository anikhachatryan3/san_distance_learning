<template>
  <div>
    <b-card-group deck>
      <b-card
        title="English Class"
        bg-variant="light"
        img-src="https://static-s.aa-cdn.net/img/ios/415071093/bcac7393903dd60ebd9966a8ebab3bde?v=1"
        img-alt="Image" img-top
        border-variant="dark"
        tag="article"
        style="max-width: 20rem;"
        class="mb-3"
      >
      <b-card-text></b-card-text>
      <b-button href="/english" variant="primary">Open</b-button>
      <template v-slot:footer>
      <small class="text-muted">Name of Teacher</small>
      </template>
    </b-card>

    <b-card title="Math Class" 
    bg-variant="warning"
    img-src="https://is5-ssl.mzstatic.com/image/thumb/Purple114/v4/78/5d/f0/785df065-7d09-1089-f370-5854fc212be9/source/512x512bb.jpg" img-alt="Image" img-top
    border-variant="dark"
    tag="article"
    style="max-width: 20rem;"
    class="mb-3"
    >
      <b-card-text>
      </b-card-text>
      <b-button href="/math" variant="primary">Open</b-button>
      <template v-slot:footer>
        <small class="text-muted">Name of Teacher</small>
      </template>
    </b-card>

    <b-card title="Geography Class" 
    bg-variant="success"
    img-src="https://static-s.aa-cdn.net/img/ios/1128664538/1cd597aeec91e594017d1e3862b84b34?v=1" img-alt="Image" img-top
    border-variant="dark"
    tag="article"
    style="max-width: 20rem;"
    class="mb-3"
    >
      <b-card-text>
      </b-card-text>
      <b-button href="/geography" variant="primary">Open</b-button>
      <template v-slot:footer>
        <small class="text-muted">Name of Teacher</small>
      </template>
    </b-card>


    <b-card title="Science Class"
    bg-variant="danger" 
    img-src="https://is2-ssl.mzstatic.com/image/thumb/Purple114/v4/12/88/fd/1288fd57-a0c9-e325-e793-bbad8e557ee6/source/256x256bb.jpg" img-alt="Image" img-top
    border-variant="dark"
    tag="article"
    style="max-width: 20rem;"
    class="mb-3"
    >
      <b-card-text>
      </b-card-text>
      <b-button href="/science" variant="primary">Open</b-button>
      <template v-slot:footer>
        <small class="text-muted">Name of Teacher</small>
      </template>
    </b-card>
  </b-card-group>
</div>
