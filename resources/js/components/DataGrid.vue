<template>
    <div class="">
        <div id="table-wrapper" class="ui container">
            <h2><strong>&lt;Vuetable-2&gt;</strong> with Bootstrap 3</h2>
            <vuetable ref="vuetable"
                      api-url="https://vuetable.ratiw.net/api/users"
                      :fields="fields"
                      :sort-order="sortOrder"
                      :css="css.table"
                      pagination-path=""
                      :per-page="3"
                      @vuetable:pagination-data="onPaginationData"
                      @vuetable:loading="onLoading"
                      @vuetable:loaded="onLoaded"
            >
            </vuetable>

        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable.vue'
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination.vue'

    export default {
        components: {
            vuetable: Vuetable,
            'vuetable-pagination': VuetablePagination
        },
        data () {
            return {
                fields: [
                    {
                        name: 'name',
                        title: '<span class="orange glyphicon glyphicon-user"></span> Full Name',
                        sortField: 'name'
                    },
                    {
                        name: 'email',
                        title: 'Email',
                        sortField: 'email'
                    },
                    'birthdate','nickname',
                    {
                        name: 'gender',
                        title: 'Gender',
                        sortField: 'gender'
                    },
                    '__slot:actions'
                ],
                sortOrder: [
                    { field: 'name', direction: 'asc' }
                ],
                css: {
                    table: {
                        tableClass: 'table table-striped table-bordered table-hovered',
                        loadingClass: 'loading',
                        ascendingIcon: 'glyphicon glyphicon-chevron-up',
                        descendingIcon: 'glyphicon glyphicon-chevron-down',
                        handleIcon: 'glyphicon glyphicon-menu-hamburger',
                    },
                    pagination: {
                        infoClass: 'pull-left',
                        wrapperClass: 'vuetable-pagination pull-right',
                        activeClass: 'btn-primary',
                        disabledClass: 'disabled',
                        pageClass: 'btn btn-border',
                        linkClass: 'btn btn-border',
                        icons: {
                            first: '',
                            prev: '',
                            next: '',
                            last: '',
                        },
                    }
                }
            }
        },
        computed:{
            /*httpOptions(){
              return {headers: {'Authorization': "my-token"}} //table props -> :http-options="httpOptions"
            },*/
        },
        methods: {
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            },
            editRow(rowData){
                alert("You clicked edit on"+ JSON.stringify(rowData))
            },
            deleteRow(rowData){
                alert("You clicked delete on"+ JSON.stringify(rowData))
            },
            onLoading() {
                console.log('loading... show your spinner here')
            },
            onLoaded() {
                console.log('loaded! .. hide your spinner here')
            }
        }
    }
</script>