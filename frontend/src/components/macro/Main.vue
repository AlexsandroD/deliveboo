<template>
    <main>
        <router-view :key="$route.path"></router-view>
    </main>
</template>

<script>

export default {
    name: 'Main',
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';

</style>