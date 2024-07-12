
<template>
  <div class="popup">
    <div class="popup-inner">
      <slot />
      <br>
      <button class="popup-close mt-2" @click="TogglePopup()">Закрыть</button>
    </div>
  </div>
</template>
<script>
export default {
  props: [
      'TogglePopup'
  ]
}
</script>
<style lang="scss" scoped>
.popup {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  background-color: rgba(0, 0, 0, 0.2);
  display: flex;
  align-content: center;
  justify-content: center;
  align-items: center;

  .popup-inner {
    background: white;
    padding: 32px;
  }
}
</style>