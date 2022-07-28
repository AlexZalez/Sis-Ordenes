<template>
    <form action=""  v-on:submit.prevent="newCliente()">
        <!-- @csrf -->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" placeholder="Fulanito" name="nombre" v-model="nombre">                  
                </div>
            </div>
        </div>   
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="">Cedula:</label>
              <input type="text" class="form-control" placeholder="12.345.678" name="cedula" v-model="cedula" >                  
            </div>
          </div>
        </div>  
        <div class="row">
            <div class="col-5">
                <label for="inputState">Telefono</label>
                <select id="prefijo" class="form-control" v-model="prefijo">
                    <option selected>Seleccione</option>
                    <option value="0424">0424</option>
                    <option value="0412">0412</option>
                    <option value="0416">0416</option>
                    <option value="0426">0426</option>
                    <option value="0414">0414</option>
                </select>
            </div>
            <div class="col-7">
                <label for="inputZip">&nbsp;</label>
                <input type="text" class="form-control" placeholder="123-45-67" id="telefono" v-model="numero">
            </div>
        </div>
        <input type="submit" value="Enviar" class="btn mt-4 btn-success float-right">
    </form>
    
</template>

<script>
export default {
    data(){
        return{
            nombre: '',
            cedula: '',
            prefijo: '',
            numero: ''
        }
    },
    mounted() {
        console.log('Formulario Cargado');
    },
    methods: {
        newCliente(){
            this.celular = this.prefijo+this.numero;
             
            let cliente = {
                id: 2,
                nombre: this.nombre,
                cedula: this.cedula,
                telefono: this.celular
            };
            this.$emit('new', cliente) 
            
            /* alert(
            this.nombre+' '+
            this.cedula+' '+
            this.celular            
            )  */   
        }
    }
}
</script>

<style>

</style>