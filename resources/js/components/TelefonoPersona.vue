<template>
    <div>
<table class="table table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Tipo de Telefono</th>
                    <th scope="col" colspan="2" class="text-center">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="telf in telefonos" :key="telf.persona_id">
                    <th scope="row">{{ telf.id }}</th>
                    <td>{{ telf.telefono }}</td>
                    <td>{{ telf.tipoTelefono }}</td>
                    <td>
                        <button
                            @click="
                                modificar = true;
                                abrirModal(telf);
                            "
                            class="btn btn-primary"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>
                        <button
                            @click="eliminar(telf.id)"
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

        };
    },
    methods: {
    },
    props: {
        telefonos:{
            // type:array
        }
    }
};
</script>
