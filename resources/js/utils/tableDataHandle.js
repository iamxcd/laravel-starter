export function responseDataFormat(response, th) {
    th.tableData = response.data

    let pagination = response.pagination
    th.pagination = {
        currentPage: pagination.page,
        pageSize: pagination.page_size,
        total: pagination.total,
        page: pagination.page,
        page_size: pagination.page_size,
    }

    th.loading = false
    th.queryParamsChange = false
}

export const tableDefaultData = () => {
    return {
        queryParams: {

        },
        tableData: [],
        pagination: {
            currentPage: 1,
            pageSize: 10,
            total: 0,
            page: 1,
            page_size: 10
        },
        form: {},
        loading: false
    }
}