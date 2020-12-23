export function responseDataFormat(response, th) {
    th.tableData = response.data.data

    let meta = response.data.meta
    th.pagination = {
        currentPage: meta.current_page,
        pageSize: meta.per_page,
        total: meta.total,
        from: meta.from,
        lastPage: meta.last_page,
        to: meta.to
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
            pageSize: 15,
            total: 0,
            from: 1,
            lastPage: 1,
            to: 1
        },
        form: {},
        loading: false
    }
}