<template>
    <div class="">
        <div class="col-md-12">
            <data-grid-filter :filters="userFilters" @filter="getByFilter"></data-grid-filter>
        </div>
        <div id="table-wrapper" class="ui container">
            <vuetable ref="vuetable"
                      :api-url="url"
                      :fields="fields"
                      :sort-order="sortOrder"
                      :css="css.table"
                      :append-params="filters"
                      pagination-path=""
                      :per-page="3"
                      @vuetable:pagination-data="onPaginationData"
            >
                <template slot="actions" scope="props" v-if="actionButtons">
                    <div class="table-button-container">
                        <button class="btn btn-success btn-sm" @click="viewRow(props.rowData)">
                            <span class="fa fa-eye"></span>
                        </button>&nbsp;&nbsp;

                        <button class="btn btn-warning btn-sm" @click="editRow(props.rowData)">
                            <span class="fa fa-pencil"></span>
                        </button>&nbsp;&nbsp;

                        <button class="btn btn-danger btn-sm" @click="deleteRow(props.rowData)">
                            <span class="fa fa-trash"></span>
                        </button>&nbsp;&nbsp;
                    </div>
                </template>

            </vuetable>
            <vuetable-pagination ref="pagination"
                                 :css="css.pagination"
                                 @vuetable-pagination:change-page="onChangePage"
            ></vuetable-pagination>
        </div>
    </div>
</template>

<style>
    .data-grid-actions {
        width: 15%;
    }
</style>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable.vue'
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination.vue'
    import DataGridFilter from './DataGridFilter.vue'

    export default {
        components: {
            vuetable: Vuetable,
            'vuetable-pagination': VuetablePagination,
            dataGridFilter: DataGridFilter
        },
        props: ['url', 'customFields', 'primaryKey', 'actionButtons', 'userFilters'],
        data () {
            return {
                fields: [],
                filters: {},
                sortOrder: [
                    { field: 'name', direction: 'asc' }
                ],
                css: {
                    table: {
                        tableClass: 'table table-striped table-bordered table-hovered',
                        loadingClass: 'loading',
                        ascendingIcon: 'fa fa-sort-asc',
                        descendingIcon: 'fa fa-sort-desc',
                        handleIcon: 'fa fa-trash',
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
        methods: {
            getByFilter (data) {
                console.log(data)
                this.filters[data.name] = data.value;
                Vue.nextTick( () => this.$refs.vuetable.refresh() )
            },
            assocUserFilters () {
                console.log(this.userFilters)
                Object.keys(this.userFilters).map(filter => {
                    this.$set(this.filters, filter, '')
                    this.userFilters[filter].title = this.userFields[filter]
                })
            },
            assocFields () {
                const customFields = this.customFields
                for (let field in customFields) {
                    let fieldInfo = {
                        name: field,
                        title: customFields[field],
                        dataClass: this.getDataClass(field),
                        titleClass: this.getFieldClass(field)
                    }
                    if (this.mutators && field in this.mutators) {
                        fieldInfo.callback = this.applyMutator(this.mutators[field])
                    }

                    this.fields.push(fieldInfo)
                }
                this.fields.push({
                    name: '__slot:actions',
                    title: '#',
                    dataClass: 'data-grid-actions'
                })
            },
            getDataClass (field) {
                if (this.dataCss) {
                    return dataCss[field]
                }
                return ''
            },
            getFieldClass (field) {
                if (this.titleCss) {
                    return this.titleCss[field]
                }
                return ''
            },
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            },
            editRow(rowData){
                let currentLocation = window.location;
                let url = currentLocation+'/'+rowData[this.primaryKey]+'/'+'edit';

                window.location.replace(url)
            },
            viewRow(rowData){
                let currentLocation = window.location;
                let url = currentLocation+'/'+rowData[this.primaryKey];

                window.location.replace(url)
            },
            deleteRow(rowData) {
                Swal.fire({
                    title: "Deletar registro?",
                    text: "Seus registros não poderão ser recuperados!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'Sim, deletar registro!'
                }).then((result) => {
                    if (result.value) {
                        let currentLocation = window.location.pathname;
                        let url = currentLocation + "/" + rowData[this.primaryKey];

                        axios.delete(url)
                            .then( () => {
                                toastr.success('Registro deletado.', 'Sucesso!')
                                this.$refs.vuetable.refresh();
                            })
                            .catch(() => toastr.error('Erro ao deletar produto', 'Erro!'))
                    }
                })
            }
        },
        created () {
            this.assocFields();
            this.assocUserFilters();
        }
    }
</script>