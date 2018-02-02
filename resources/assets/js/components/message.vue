<template>
    <div><li style="list-style-type: none;  border-radius: 5px;margin: 5px ;padding: 12px;text-align: left;width: 320px;height: 40px" :class="className">  <slot></slot>  </li>
        <small style=" border-radius: 2px;padding: 5px;" :class="badgeClass" class=" float-right">{{ user }}</small>
        <small style=" border-radius: 2px;padding: 5px;" :class="badgeClass" class=" float-right">{{ time }}</small>
    </div>

</template>

<script>
    export default {
        props:[
            'color',
            'user',
            'time'
        ],
        computed:{
            className(){
                return 'list-group-item-'+this.color;
            },
            badgeClass(){
                return 'label label-'+this.color;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
