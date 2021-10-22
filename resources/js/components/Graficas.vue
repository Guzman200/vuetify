<template>
    <div>
        <pie-chart></pie-chart>

        <line-chart></line-chart>
    </div>
</template>

<script>

import PieChart from './PieChart';
import LineChart from './LineChart';

export default {
    components : { PieChart, LineChart }    
}
</script>