import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'

import axios from 'axios';
import Routers from './routers';

axios.defaults.withCredentials = true;

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <Routers />
  </StrictMode>,
)
