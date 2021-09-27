import axios from 'axios';

export const api = axios.create({
  baseURL: mynamespace.rootapiurl,
  headers: {
    'content-type': 'application/json',
    'X-WP-Nonce': mynamespace.nonce
  }
});