<script setup>
    defineProps([
        "rows"
    ])

    // console.dir(rows);
    // console.dir($page.props.rows);
</script>
<style>
    .forTitle span, .forContent span {
        display: inline-block;
        width: 10vw;
    }
</style>
<template>
    <div>
        <div class="forTitle">
            <span>Id</span>
            <span>Name</span>
            <span>Date</span>
        </div>
        <div v-for="(row, key) in rows.data" :key="key" class="forContent">
            <div v-if="row.length > 1">
                <div v-for="(item, index) in row" :key="index">
                    <span>{{ item.id }}</span>
                    <span>{{ item.name }}</span>
                    <span>{{ item.date }}</span>
                </div>
            </div>
            <div v-else>
                <div>
                    <span>{{ row.id }}</span>
                    <span>{{ row.name }}</span>
                    <span>{{ row.date }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
