<template>
<div>
    <div class="modal" :class="{ mostrar: modal }">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- Modal content-->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ tituloModal }}</h4>
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
                        <div class="my-4">
                            <label for="nombre">Nombre</label>
                            <input
                                v-model="persona.nombre"
                                type="text"
                                class="form-control"
                                id="nombre"
                                placeholder="Nombres"
                            />
                            <span class="text-danger" v-if="errores.nombre">
                                El Nombre es obligatorio
                            </span>
                        </div>
                        <div class="my-4">
                            <label for="apellido">Apellidos</label>
                            <input
                                v-model="persona.apellido"
                                type="text"
                                class="form-control"
                                id="apellido"
                                placeholder="Apellidos"
                            />
                            <span class="text-danger" v-if="errores.apellido">
                                El Apellido es obligatorio
                            </span>
                        </div>
                        <div class="my-4">
                            <label for="cedula">Cedula</label>
                            <input
                                minlength="10"
                                maxlength="10"
                                v-model="persona.cedula"
                                type="number"
                                class="form-control"
                                id="cedula"
                                placeholder="Cedula"
                            />
                            <span class="text-danger" v-if="errores.cedula">
                                La Cedula es obligatoria
                            </span>
                        </div>

                        <div class="my-4">
                            <label for="correo">Correo</label>
                            <input
                                v-model="persona.correo"
                                type="email"
                                class="form-control"
                                id="correo"
                                placeholder="Correo"
                            />
                            <span class="text-danger" v-if="errores.correo">
                                El Correo es obligatorio
                            </span>
                        </div>
                        <!-- TELEFONO -->

                        <!-- <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                        </table> -->
                        <!-- <form class="row row-cols-lg-auto g-3 align-items-center">
              <div class="col-12">
                <label
                  class="visually-hidden"
                  for="inlineFormInputGroupUsername"
                  >Numero de telefono</label
                >
                <input
                  minlength="10"
                  maxlength="10"
                  v-model="persona.telefono"
                  type="integer"
                  class="form-control"
                  id="telefono"
                  placeholder="Telefono"
                />
              </div>

            </form> -->
                        <!-- <label for="telefono">Telefonos</label>
                    <div class="row align-items-start">
                        <div class="col">
                        <input
                            type="number"
                            v-model="persona.telefono"
                            class="form-control"
                            placeholder="Agregar Telefono"
                        />
                        </div>

                        <div class="input-group-append">
                            <button
                                v-on:click="addTask()"
                                class="btn btn-success btn-lg"
                            >
                               <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>

                        </div>
                        <br />
                        <p v-if="persona.telefono.length == 0">Sin numero aun!</p>
                        <ul class="list-group">
                            <li
                                v-for="(telefono, index) of listTask"
                                :key="index"
                                class="
                                    list-group-item
                                    d-flex
                                    justify-content-between
                                "
                            >
                                <span
                                    class="cursor"
                                    v-bind:class="{
                                        'text-success': telefono.completed,
                                    }"
                                    v-on:click="completeTask(telefono, telefono)"
                                >
                                    <i
                                        v-bind:class="[
                                            telefono.completed
                                                ? 'far fa-check-circle'
                                                : 'far fa-circle',
                                        ]"
                                    ></i>
                                </span>
                                <span
                                    v-bind:class="{
                                        'line-through': telefono.completed,
                                    }"
                                    >{{ telefono.name }}</span
                                >
                                <span
                                    class="text-danger cursor"
                                    v-on:click="deleteTask(index)"
                                >
                                    <i class="fas fa-trash-alt"></i>
                                </span>
                            </li>
                        </ul> -->
                        <!-- <telefonos
                             :telefonos="telefonos" >
                        </telefonos> -->

                        <!-- /TELEFONO -->
                        <!-- TIPO DE TELEFONO -->
                        <!-- <div class="col-12 my-2">
                            <select v-model="persona.telefonoTipo">
                                <option disabled value="">
                                    Seleccion su tipo de telefono
                                </option>
                                <option value="C">Convencional</option>
                                <option value="M">Movil</option>
                                <option>Cuantico</option>
                            </select>
                        </div> -->
                        <!-- <span class="text-danger" v-if="errores.telefono">{{
                            errores.telefono[0]
                        }}</span> -->
                        <!-- /tipo de telefono -->
                        <div class="my-4">
                            <label for="direccion">Direccion</label>
                            <input
                                v-model="persona.direccion"
                                type="text"
                                class="form-control"
                                id="direccion"
                                placeholder="direccion"
                            />
                            <span
                                class="text-danger"
                                v-if="errores.direccion"
                                >{{ errores.direccion[0] }}</span
                            >
                        </div>
                        <!-- CAMPOS -->
                        <!-- <div class="my-4">
                            <label for="sexo">Sexo</label>
                            <input
                                v-model="persona.sexo"
                                type="text"
                                class="form-control"
                                id="sexo"
                                placeholder="sexo"
                            />
                            <span class="text-danger" v-if="errores.sexo">
                                {{ errores.sexo[0] }}
                            </span>
                        </div> -->
                        <!-- ----------------   --->
                        <label for="sexo">Sexo</label> <br />
                        <div>
                            <input
                                type="radio"
                                id="one"
                                value="M"
                                v-model="persona.sexo"
                            />
                            <label for="one">Masculino</label>
                            <br />
                            <input
                                type="radio"
                                id="two"
                                value="F"
                                v-model="persona.sexo"
                            />
                            <label for="two">Femenino</label>
                            <span class="text-danger" v-if="errores.sexo">
                                {{ errores.sexo[0] }}
                            </span>
                        </div>
                        <!-- ------------------ -->
                        <div class="my-4">
                            <label for="descripcion">Nota</label>
                            <input
                                v-model="persona.descripcion"
                                type="text"
                                class="form-control"
                                id="descripcion"
                                placeholder="Nota"
                            />
                            <span
                                class="text-danger"
                                v-if="errores.descripcion"
                                >{{ errores.descripcion[0] }}</span
                            >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-success"
                            data-dismiss="modal"
                            @click="guardar()"
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
<table class="table table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col" colspan="2" class="text-center">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="per in personas" :key="per.id">
                    <th scope="row">{{ per.id }}</th>
                    <td>{{ per.nombre }}</td>
                    <td>{{ per.apellido }}</td>
                    <td>{{ per.cedula }}</td>
                    <td>{{ per.correo }}</td>
                    <td>{{ per.telefono }}</td>
                    <td>{{ per.direccion }}</td>
                    <td>{{ per.sexo }}</td>
                    <td>{{ per.descripcion }}</td>
                    <td>
                        <!-- editar -->
                        <button
                            @click="
                            modificar=true;
                            abrirModal(per)"
                            class="btn btn-primary"

                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>
                        <!-- borrar -->
                        <button
                            @click="eliminar(per.id)"
                            class="btn btn-danger"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

</div>
</template>
<script>
export default {
    // name: "Task",
    data() {
        return {
             persona: {
                id: null,
                nombre: "",
                apellido: "",
                cedula: "",
                correo: "",
                // telefono: "",
                // telefonoTipo: "",
                direccion: "",
                sexo: "",
                descripcion: "",
            },
            id: 0,
            modificar: true,
            modal: 0,
            tituloModal: "",
            // personas: [],
            // telefonos: [],
            errores: {},
        };
    },
    methods: {
        listar() {
           axios.get("/personas").
           then( response =>{
                this.personas = response.data;
           });
            // this.telefonos = res.data;
        },
        listarTelefonos() {
            axios.get("/telefonos").
            then( response=> {
                  this.telefonos = response.data;
            })
        },
        eliminar(id) {
            axios.delete("/personas/" + id).
            then(response=>{
                 this.listar();
            })

        },
       async guardar() {
            try {
                // console.log(this.persona.id);
                if (this.modificar) {
                    //  const res = await axios.put("/personas/" + this.id, this.persona);
                    const res = await axios.put("/personas/" + this.persona.id,this.persona);
                }
                else {
                    const res = await axios.post("/personas", this.persona);
                }
                this.cerrarModal();
                this.listar();
            }
            // try {
            //     if (this.modificar) {
            //     axios.put
            //         then(response=>{
            //             ("/personas/" + this.id, this.persona);
            //         });
            //     }
            //     else {
            //         axios.post
            //         then(response=>{
            //             ("/personas", this.persona);
            //         })
            //         // const res = await axios.post("/personas", this.persona);
            //     }
            //     this.cerrarModal();
            //     this.listar();
            // }
            catch (error) {
                console.log("Consola.log Catch");
                if (error.response.data) {
                    this.errores = error.response.data.errors;
                }
                console.log(error.response.data);
            }
        },
        abrirModal(data) {
            this.modal = 1;
            if(this.modificar){
                this.tituloModal="Editar Usuario";
                this.persona.id=data.id;
                this.persona.nombre=data.nombre;
                this.persona.apellido=data.apellido;
                this.persona.cedula=data.cedula;
                this.persona.correo=data.correo;
                this.persona.direccion=data.direccion;
                this.persona.sexo=data.sexo;
                this.persona.descripcion =data.descripcion;

                }
                else
                {
                 this.tituloModal = "Crear Usuario";
                this.persona.nombre = "";
                this.persona.apellido = "";
                this.persona.cedula = "";
                this.persona.correo = "";
                    // this.telefono.telefono = "";
                    // this.telefono.telefonoTipo = "";
                this.persona.direccion = "";
                this.persona.sexo = "";
                this.persona.descripcion = "";
            }
        },
        cerrarModal() {
            this.modal = 0;
        },
        mounted() {
            // this.listar();
            // listarTelefonos();
        }
    },
    props: {
        // modificar,
        personas:{

        }
    }
};
</script>
