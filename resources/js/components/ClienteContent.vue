<template>
    <div class="row">
        <div class="col-6">
          <!-- Agrega Cliente  @new="addCliente()" -->
          <cliente-form @new="addCliente"></cliente-form>
        </div>
        <div class="col-6">
          <!-- Tabla de Clientes -->
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cedula</th>
                    </tr>
                </thead>
                <tbody>
                        <clientes-component v-for="cliente in clientes" 
                                            v-bind:key="cliente.id"
                                            :cliente="cliente"
                                            ></clientes-component>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        
        data(){
            return {
                clientes: [{
                'id': 1,
                'nombre': 'Aleis',
                "cedula": '28544285' 
                }]  
            }
        },
        mounted() {
            console.log('Contenedor Cargado')
        },
        methods: {
             addCliente(cliente){
                this.clientes.push(cliente)  
            } 
        }
    }
</script>