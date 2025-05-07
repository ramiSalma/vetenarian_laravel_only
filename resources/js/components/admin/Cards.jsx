import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

const Cards = () => {
  const [dogs, setDogs] = useState([]);
  const [page, setPage] = useState(1);

  const fetchDogs = async (page = 1) => {
    const res = await fetch(`http://127.0.0.1:8000/api/dogs?page=${page}`);
    const data = await res.json();
    setDogs(data);
  };

  const deleteDog = async (id) => {
    const res = await fetch(`http://127.0.0.1:8000/api/dogs/${id}`, {
      method: 'DELETE',
    });

    if (res.ok) {
      setDogs((prevDogs) => prevDogs.filter((dog) => dog.id !== id));
    } else {
      alert('Failed to delete dog');
    }
  };

  useEffect(() => {
    fetchDogs(page);
  }, [page]);

  return (
    <div className="p-4 mt-40">
      <div className="flex justify-between items-center mb-4">
        <h2 className="text-xl font-bold">Dog List</h2>
        <Link to="/admin/create" className="bg-blue-500 text-white px-4 py-2 rounded">
          Create Dog
        </Link>
      </div>
      <div className="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-7">
        {dogs.data?.map((dog) => (
          <div key={dog.id} className="bg-white border border-2 border-purple-950 p-4 rounded shadow relative">
            <img
              src={dog.image || '/placeholder.jpg'}
              alt={dog.name}
              className="w-full h-50 object-cover rounded"
            />
            <h3 className="text-lg font-semibold mt-2">{dog.name}</h3>
            <p>Type: {dog.type}</p>
            <p>Age: {dog.age}</p>
            <p>Status: {dog.status}</p>
            <Link to={`/admin/show/${dog.id}`} className="text-white bg-purple-950 p-2 mt-6 rounded">
              Details
            </Link>

            {/* Update and Delete buttons */}
            <div className="absolute top-2 right-2 space-x-2">
              <Link
                to={`/dogs/edit/${dog.id}`}
                className="text-white bg-purple-950 hover:bg-purple-700 text-xs px-2 py-1 rounded border border-purple-950 hover:border-purple-700 transition"
              >
                Update
              </Link>
              <button
                onClick={() => deleteDog(dog.id)}
                className="text-white bg-red-600 hover:bg-red-500 text-xs px-2 py-1 rounded border border-red-600 hover:border-red-500 transition"
              >
                Delete
              </button>
            </div>
          </div>
        ))}
      </div>
      <div className="mt-4 flex justify-center gap-2">
        <button onClick={() => setPage(page - 1)} disabled={!dogs.prev_page_url} className="px-3 py-1 bg-purple-950 text-white hover:bg-purple-700 rounded">
          Previous
        </button>
        <button onClick={() => setPage(page + 1)} disabled={!dogs.next_page_url} className="px-3 py-1 bg-purple-950 text-white hover:bg-purple-700 rounded">
          Next
        </button>
      </div>
    </div>
  );
};

export default Cards;
