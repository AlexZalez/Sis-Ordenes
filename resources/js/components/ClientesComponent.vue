<template>
    
        <tr>
          <th scope="row">{{cliente.id}}</th>
          <td>{{cliente.nombre}}</td>
          <td>{{cliente.cedula}}</td>                          
        </tr>
      
</template>

<script>
    export default {
      
      
      props: ['cliente'],
        data(){
          return {
            
          };
        },
        mounted() {
            console.log('cliente cargado')
        }
    }
</script>
