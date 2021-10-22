<template>
  <div>

    <!-- BUSQUEDA -->
    <v-text-field
      v-model="search"
      append-icon="mdi-magnify"
      label="Buscar"
      single-line
      hide-details
      class="mb-4"
    >
    </v-text-field>

    <v-data-table
      :headers="headers"
      :items="desserts"
      sort-by="id"
      class="elevation-2 mt-2"
      :search="search"
    >
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>Usuarios del sistema</v-toolbar-title>
          <v-spacer></v-spacer>

          <!-- MODAL EDITAR Y CREAR BODEGA -->
          <v-dialog v-model="dialog" max-width="650px" persistent>
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                Nueva bodega
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="text-h5">{{ formTitle }}</span>
              </v-card-title>

              <v-card-text>
                <v-container>
                  <v-row>
                    <!-- Numero de bodega -->
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field
                        outlined
                        dense
                        label="Número de bodega"
                      ></v-text-field>
                    </v-col>
                    <!-- Nombre -->
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field
                        outlined
                        dense
                        label="Nombre"
                      ></v-text-field>
                    </v-col>
                    <!-- Correo -->
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field
                        outlined
                        dense
                        label="Correo electrónico"
                      ></v-text-field>
                    </v-col>
                    <!-- Teléfono -->
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field
                        outlined
                        dense
                        type="number"
                        label="Teléfono"
                      ></v-text-field>
                    </v-col>
                    <!-- Teléfono -->
                    <v-col cols="12" sm="12" md="12">
                      <v-text-field
                        outlined
                        dense
                        label="Dirección"
                      ></v-text-field>
                    </v-col>
                    
                  </v-row>
                </v-container>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">
                  Cancelar
                </v-btn>
                <v-btn color="blue darken-1" text @click="save"> Guardar </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>


          <!-- MODAL ELIMINAR BODEGA -->
          <v-dialog v-model="dialogDelete" max-width="500px">
            <v-card>
              <v-card-title class="text-h5"
                >¿Estas seguro de eliminar la bodega?</v-card-title
              >
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeDelete"
                  >Cancelar</v-btn
                >
                <v-btn color="blue darken-1" text @click="deleteItemConfirm"
                  >Eliminar</v-btn
                >
                <v-spacer></v-spacer>
              </v-card-actions>
            </v-card>
          </v-dialog>


        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="editItem(item)"> mdi-pencil </v-icon>
        <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
      </template>
      <template v-slot:no-data>
        <v-btn color="primary" @click="initialize"> No hay usuarios </v-btn>
      </template>
    </v-data-table>
  </div>
</template>

<script>

export default {
  data: () => ({
    search: "",
    dialog: false,
    dialogDelete: false,
    bodega : null,
    headers: [
      { text: "Identificador", align: "start", sortable: true, value: "id" },
      { text: "Nombre", value: "name" },
      { text: "Correo electronico", value: "email" },
      { text: "Teléfono", value: "phone" },
      { text: "Actions", value: "actions", sortable: false },
    ],
    desserts: [],
    editedIndex: -1,
    editedItem: {
      name: "",
      calories: 0,
      fat: 0,
      carbs: 0,
      protein: 0,
    },
    defaultItem: {
      name: "",
      calories: 0,
      fat: 0,
      carbs: 0,
      protein: 0,
    },
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Nuevo usuario" : "Editar usuario";
    },
  },

  watch: {
    dialog(val) {
      val || this.close();
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    initialize: async function () {
      this.desserts = await this.obtenerUsuarios();
    },
    obtenerUsuarios: async function () {
      const usuarios = new Promise((resolver, rechazar) => {
        axios
          .get(`/api/users`)
          .then((response) => {
            resolver(response.data);
          })
          .catch(({ response }) => {
            rechazar([]);
          });
      });

      return usuarios;
    },

    editItem(item) {

      let self = this;

      axios
        .delete(`/bodega/${item.id}`)
        .then((response) => {
          console.log(response);
          self.initialize();
        })
        .catch(({ response }) => {
          console.log(response);
        });
      
      //this.editedIndex = this.desserts.indexOf(item);
      //this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      this.bodega = item;
      //this.editedItem = Object.assign({}, item);
      this.dialogDelete = true;
    },

    deleteItemConfirm() {

      let self = this;

      axios
        .delete(`/bodega/${self.bodega.id_b}`)
        .then((response) => {
          console.log(response);
          self.initialize();
        })
        .catch(({ response }) => {
          console.log(response);
        });

      this.closeDelete();      
    
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    closeDelete() {
      this.dialogDelete = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      if (this.editedIndex > -1) {
        Object.assign(this.desserts[this.editedIndex], this.editedItem);
      } else {
        this.desserts.push(this.editedItem);
      }
      this.close();
    },
  },
};
</script>