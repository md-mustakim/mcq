<template>

    <div class="d-flex flex-wrap">

            <div class="d-flex border-bottom mb-4 w-50" v-for="i in 30" :key="i.toString()">
                <div class="mx-2">{{ i + 1 }}</div>
                <div class="">
                    <div class="h6 font-weight-bold">What is You Father Name? {{ currentTime }}</div>
                    <div class="">

                        <div class="">
                            <input type="radio" :id="['one_'+i]" :name="['answer_'+i]"  v-model="data['answer_'+i]" value="Father">
                            <label :for="['one_'+i]">Father</label>
                        </div>

                        <div class="">
                            <input type="radio" :id="['two_'+i]" :name="['answer_'+i]" v-model="data['answer_'+i]" value="Mother">
                            <label :for="['two_'+i]">Mother</label>
                        </div>

                        <div class="">
                            <input type="radio" :id="['three_'+i]" :name="['answer_'+i]" v-model="data['answer_'+i]" value="Sister">
                            <label :for="['three_'+i]">Sister</label>
                        </div>


                        <div class="">
                            <input type="radio"
                                   :id="['four_'+i]"
                                   :name="['answer_'+i]"
                                   v-model="data['answer_'+i]"
                                   @click="check"
                                   value="Four">
                            <label :for="['four_'+i]">Four</label>
                        </div>


                    </div>
                </div>

            </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            this.countDown();
        },
        data(){
            return{
                name: "sysco",
                data: {},
                examTime: 20,
                currentTime: 0,
            }
        },
        methods: {
            check(){
                console.log(this.data);
            },
            countDown(){
                if (this.examTime > 0){
                    this.currentTime = this.examTime;
                    let timer = setInterval(()=>{
                        this.currentTime -=1;
                    }, 1000);
                }
            }

        }
    }
</script>
