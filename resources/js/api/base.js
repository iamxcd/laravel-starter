import request from '@/utils/request'

export const getList = (url, params) => {
  return request.get(url, {
    params
  })
}

export const add = (url, data) => {
  return request.post(url, data)
}

export const edit = (url, id, data) => {
  return request.put(`${url}/${id}`, data)
}

export const del = (url, id) => {
  return request.delete(`${url}/${id}`)
}

export const get = (url, params) => {
  return request.get(url, {
    params
  })
}

export function uploadUrl(type = 'image') {
  return '/upload';
}