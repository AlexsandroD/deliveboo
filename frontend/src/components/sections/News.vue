<template>
    <div class="news-section">
        <h2>Novitá della nostra cucina</h2>
        <DelForWork />
        <DelNewsApp />
    </div>
</template>

<script>

import DelForWork from "../micro/DelForWork.vue";
import DelNewsApp from "../micro/DelNewsApp.vue";


export default {
    name:'News',
    components:{
        DelForWork,
        DelNewsApp,
    }
}
</script>

<style lang="scss" scoped>
@import "../../assets/style/global.scss";

    .news-section{
        background-color:$_whiteSmoke;
        margin: 0 auto;
    }
</style>