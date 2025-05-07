import React, { useEffect, useState } from 'react';
import { useParams, Link } from 'react-router-dom';
import axios from 'axios';

const DogDetails = () => {
  const { id } = useParams();
  const [dog, setDog] = useState(null);

  useEffect(() => {
    axios.get(`http://localhost:8000/api/dogs/${id}`)
      .then(response => setDog(response.data))
      .catch(error => console.error('Error fetching dog details:', error));
  }, [id]);

  if (!dog) return <div>Loading...</div>;

  return (
    <div className="p-6">
      <h2 className="text-3xl text-purple-950 font-semibold mb-4">{dog.name}</h2>
      <img src={dog.image} alt={dog.name} className="w-full max-w-md h-64 object-cover rounded-lg mb-4" />
      <p><strong>Type:</strong> {dog.type}</p>
      <p><strong>Age:</strong> {dog.age}</p>
      <p><strong>Status:</strong> {dog.status}</p>
      <Link to="/adoption" className="inline-block mt-4 text-purple-950 underline">← Back to list</Link>
    </div>
  );
};

export default DogDetails;
