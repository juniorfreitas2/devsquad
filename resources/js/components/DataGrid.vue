<template>
    <div class="">
        <div id="table-wrapper" class="ui container">
            <vuetable ref="vuetable"
                      :api-url="url"
                      :fields="fields"
                      :sort-order="sortOrder"
                      :css="css.table"
                      pagination-path=""
                      :per-page="3"
                      @vuetable:pagination-data="onPaginationData"
            >
                <template slot="actions" scope="props">
                    <div class="table-button-container">
                        <button class="btn btn-warning btn-sm" @click="editRow(props.rowData)">
                            <span class="fa fa-pencil"></span> Edit
                        </button>&nbsp;&nbsp;

                        <button class="btn btn-danger btn-sm" @click="deleteRow(props.rowData)">
                            <span class="fa fa-trash"></span> Delete
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

    export default {
        components: {
            vuetable: Vuetable,
            'vuetable-pagination': VuetablePagination
        },
        props: ['url', 'customFields', 'primaryKey'],
        data () {
            return {
                fields: [],
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
            deleteRow(rowData){
                let currentLocation = window.location.pathname;
                let url = currentLocation+"/"+rowData[this.primaryKey];

                axios.delete(url)
                    .then(function (response) {
                        console.log(response);
                        toastr.success(response[0].message, 'Sucesso');
                    })
                    .catch(function (error) {
                        console.log(error);
                        toastr.success(error[0].message, 'Erro');
                    })
            }
        },
        created () {
            this.assocFields();
        }
    }
</script>