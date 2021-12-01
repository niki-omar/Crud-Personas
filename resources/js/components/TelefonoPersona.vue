<template>
    <div>
        <table class="table table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Telefono</th>
                    <th scope="col">Tipo de Telefono</th>
                    <th scope="col" colspan="2" class="text-center">Accion</th>
                </tr>
            </thead>
             <tbody v-if="telefonos.length===0">
                 <p>Sin numeros registrados aun!!</p>
                 <!-- <tr v-for="(telf, index) in telefonos" :key="telf.id">
                            <td>{{ telf.telefono }}</td>
                            <td>{{ telf.tipo_telefono }}</td>
                            <td>
                                <button
                                    @click="
                                        modificar=true;
                                        abrirModal(telf,index)

                                    "
                                    class="btn btn-primary"

                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td>
                                <button
                                    @click="eliminar(telf.id,index)"
                                    class="btn btn-danger"
                                >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr> -->
             </tbody>
            <tbody v-else>
                <!-- <p>Sin numeros registrados aun!!</p> -->
                        <tr v-for="(telf, index) in telefonos" :key="telf.id">
                            <td>{{ telf.telefono }}</td>
                            <td>{{ telf.tipo_telefono }}</td>
                            <td>
                                <button
                                    @click="
                                        modificar=true;
                                        abrirModal(telf,index)

                                    "
                                    class="btn btn-primary"

                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td>
                                <button
                                    @click="eliminar(telf.id,index)"
                                    class="btn btn-danger"
                                >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
            </tbody>
        </table>
 <div class="modal" :class="{ mostrar: modal }">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">{{ tituloModal }} </h4>
                        <!-- <input v-model="persona.nombre"> -->
                        <button
                            @click="cerrarModal()"
                            type="button"
                            class="close"
                            data-dismiss="modal"
                        >
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <label>Numero</label>
                            <input
                                v-model="telefono.telefono"
                                type="number"
                                class="form-control my-2"
                                id="telefono"
                                placeholder="telefono"
                            />

                             <p class="" for="tipoTelefono">Tipo de telefono</p>
                            <input
                                type="radio"
                                id="one"
                                value="M"
                                v-model="telefono.tipo_telefono"
                            />
                            <label for="one">Movil</label>
                            <br />
                            <input
                                type="radio"
                                id="two"
                                value="C"
                                v-model="telefono.tipo_telefono"
                            />
                            <label for="two">Convencional</label>

                    </div>
                    <div class="modal-footer">
                    <button

                            type="button"
                            class="btn btn-success"
                            data-dismiss="modal"
                            @click="guardar(telefono.id,index)
                            modificar=true;"
                        >
                            Guardar
                        </button>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                            @click="cerrarModal()"
                        >
                            Cancelar
                        </button>

                    </div>
                </div>
            </div>
        </div>
</div>

</div>
</template>
<script>
export default {
  data() {
    return {
      //  persona: {
      //     nombre: "",
      //     apellido: "",
      //     cedula: "",
      //     correo: "",
      //     // telefonos: [],
      //     // telefonoTipo: "",
      //     direccion: "",
      //     sexo: "",
      //     descripcion: "",
      // },
      telefono: {
        id: null,
        persona_id: "",
        telefono: "",
        tipo_telefono: "",
      },
      modificar: true,
      modal: 0,
      tituloModal: "",
      persona: [],
      index: null,
      mostrarNumero:false,
      // telefonos: [],
    };
  },
  methods: {
    // guardar(id) {
    //     console.log(id);
    //      if (this.modificar) {
    //         // console.log("Entrando al metodo GuardarTelefono con su respectivo ID por persona: ");
    //         // console.log(this.telefono.persona_id);
    //         axios.put("/telefonos",this.telefono)
    //         .then(function ({data}) {
    //             console.log(data);
    //         }).catch((err) => {
    //             console.log(err);
    //         });

    //         this.cerrarModal();
    //     }
    // },
    async guardar(id, index) {
      console.log("Guardar Async : " + id);
      try {
        if (this.modificar) {
          const res = await axios.put("/telefonos/" + id, this.telefono);

          // this.telefonos.splice(index, 1);
          // const res2 = await axios.put("/telefonos/" + this.persona_id,this.telefono);
        } else {
          // const res = await axios.post("/personas", this.persona);
          //  const res2 = await axios.put("/telefonos/",this.telefono);
        }
        this.cerrarModal();
        this.listar();
      } catch (error) {
        console.log("Consola.log Catch");
        if (error.response.data) {
          this.errores = error.response.data.errors;
        }
        console.log(error.response.data);
      }
    },
    // editarTelefono(data){
    //     console.log(data);

    // },
    abrirModal(data, index) {
      console.log(data.telefono);
      this.modal = 1;
      if (this.modificar) {
        this.index = index;
        // console.log(data.id);
        this.tituloModal = "Editar Numero";
        this.telefono.id = data.id;
        this.telefono.persona_id = data.persona_id;
        this.telefono.telefono = data.telefono;
        this.telefono.tipo_telefono = data.tipo_telefono;

        // this.listarTelefonos(data.id);
      }
      //     else
      //     {
      //     this.id=0;
      //     this.tituloModal = "Crear Usuario";
      //     this.persona.nombre = "";
      //     this.persona.apellido = "";
      //     this.persona.cedula = "";
      //     this.persona.correo = "";
      //         // this.telefono.telefono = "";
      //         // this.telefono.telefonoTipo = "";
      //     this.persona.direccion = "";
      //     this.persona.sexo = "";
      //     this.persona.descripcion = "";
      // }
    },
    listar() {
      axios
        .get("/telefonos/" + this.telefono.persona_id, this.telefono)
        .then((response) => {
          this.telefonos = response.data;
        });
    },
    cerrarModal() {
      this.modal = 0;
    },
    // listarTelefonos(persona_id) {
    //     // console.log(persona_id);
    //     // console.log(`Entré a la funcion ${persona_id}`)

    //     axios.get("/telefonos/"+persona_id).
    //     then( response=> {
    //             this.persona.telefonos = response.data ;
    //             // this.telefonos = response.data;
    //     }).catch(error => {
    //         console.log(error)
    //     });
    // },
    eliminar(id, index) {
      axios.delete("/telefonos/" + id).then((response) => {
        // console.log("1: "+this.listarTelefonos(id));
        //   console.log(data);
        //  this.listar();
        this.telefonos.splice(index, 1);
        // this.id=telefonos.splice(id)
        // console.log(id);
      });
    },
  },
  mounted() {
    let vue = this;
    // this.listar();
    // this.listarTelefonos();
  },
  props: {
    telefonos: {
      type: Array,
    },
  },
};
</script>
