import React, { useEffect, useState } from 'react';
import axios from 'axios';
import {Link} from 'react-router-dom';
const DogList = () => {
    const [dogs, setDogs] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [typeFilter, setTypeFilter] = useState('');
    const [page, setPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);

    useEffect(() => {
        setLoading(true);
        axios.get('http://localhost:8000/api/dogs', {
            params: {
                type: typeFilter || undefined,
                page
            }
        })
        .then((response) => {
            setDogs(response.data.data);
            setLastPage(response.data.last_page);
            setLoading(false);
        })
        .catch(() => {
            setError('Error fetching dogs');
            setLoading(false);
        });
    }, [typeFilter, page]);

    return (
        <div className="p-10 my-30">
            <h2 className="text-center text-purple-950 text-4xl font-semibold mb-6">Animals waiting for adoption</h2>
            
            {/* Filter */}
            <div className="mb-6 flex justify-center">
                <input
                    type="text"
                    placeholder="Filter by type"
                    value={typeFilter}
                    onChange={(e) => setTypeFilter(e.target.value)}
                    className="border p-2 rounded-lg shadow-sm focus:outline-purple-950"
                />
            </div>

            {/* Cards */}
            {loading ? <div>Loading...</div> : error ? <div>{error}</div> : (
                <>
                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {dogs.map(dog => (
                            <div key={dog.id} className="bg-white border border-purple-950 rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                {dog.image && <img className="w-full h-48 object-cover rounded-lg my-4" src={dog.image} alt={dog.name} />}
                                <h3 className="text-xl font-bold text-purple-950">{dog.name}</h3>
                                <p className="text-gray-600">Type: {dog.type}</p>
                                <p className="text-gray-600">Age: {dog.age}</p>
                                <p className="text-gray-600 mb-5">Status: {dog.status}</p>
                                <Link to={`/details/${dog.id}`} className="mt-10 py-2 px-4 bg-purple-950 text-white rounded-lg hover:bg-purple-800">
                                    See More
                                </Link>

                            </div>
                        ))}
                    </div>

                    {/* Pagination */}
                    <div className="mt-6 flex justify-center space-x-2">
                        <button
                            disabled={page === 1}
                            onClick={() => setPage(page - 1)}
                            className="px-4 py-2 bg-purple-950 text-white rounded disabled:opacity-50"
                        >
                            Previous
                        </button>
                        <button
                            disabled={page === lastPage}
                            onClick={() => setPage(page + 1)}
                            className="px-4 py-2 bg-purple-950 text-white rounded disabled:opacity-50"
                        >
                            Next
                        </button>
                    </div>
                </>
            )}
        </div>
    );
};

export default DogList;
