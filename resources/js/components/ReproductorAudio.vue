<template>
    <div class="reproductor-audio">
      <audio ref="audio" :src="audioUrl"></audio>
      <div class="reproductor-audio-botones">
        <button @click="play"><i class="fa fa-play"></i></button>
        <button @click="pause"><i class="fa fa-pause"></i></button>
        <button @click="skip(10)"><i class="fa fa-forward"></i></button>
        <button @click="skip(-10)"><i class="fa fa-backward"></i></button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      audioUrl: {
        type: String,
        required: true
      }
    },
    methods: {
      play() {
        this.$refs.audio.play();
      },
      pause() {
        this.$refs.audio.pause();
      },
      skip(seconds) {
        this.$refs.audio.currentTime += seconds;
      }
    }
  };
  </script>
  
  <style>
  .reproductor-audio {
    display: flex;
    align-items: center;
    margin-top: 10px;
  }
  
  .reproductor-audio-botones button {
    background-color: transparent;
    border: none;
    color: #333;
    cursor: pointer;
    font-size: 20px;
    margin-right: 10px;
    outline: none;
  }
  
  .reproductor-audio-botones button:hover {
    color: #f50;
  }
  </style>
  