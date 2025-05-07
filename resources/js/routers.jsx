import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Navbar from './components/home/navbar';
import Home from './components/home/Home';
import List from './components/dogList';
import VeterinaryReservation from './components/reservation';
import SignUp from './components/SignUp';
import DogDetails from './components/DogDetails';
import Cards from './components/admin/Cards';
import Create from './components/admin/create';
import Edit from './components/admin/edite';
import Show from './components/admin/show';

function Routers() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Navbar />}>
          <Route index element={<Home />} />
          <Route path="adoption" element={<List />} /> 
          <Route path="appointment" element={<VeterinaryReservation />} /> 
          <Route path="signup" element={<SignUp />} /> 
          <Route path="details/:id" element={<DogDetails />} />
          <Route path="admin" element={< Cards/>} />
          <Route path="admin/create" element={< Create/>} />
          <Route path="admin/edit/:id" element={< Edit/>} />
          <Route path="admin/show/:id" element={<Show />} />
        </Route>
      </Routes>
    </Router>
  );
}

export default Routers;
