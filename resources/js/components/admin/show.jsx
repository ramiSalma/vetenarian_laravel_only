import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';

const Show = () => {
  const { id } = useParams();
  const navigate = useNavigate();
  const [dog, setDog] = useState(null);
  const [form, setForm] = useState({});

  useEffect(() => {
    fetch(`/api/dogs/${id}`)
      .then((res) => res.json())
      .then((data) => {
        setDog(data);
        setForm(data);
      });
  }, [id]);

  const handleUpdate = async () => {
    await fetch(`http://127.0.0.1:8000/api/dogs/${id}`, {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(form),
    });
    alert('Dog updated');
  };

  const handleDelete = async () => {
    if (confirm('Delete this dog?')) {
      await fetch(`/api/dogs/${id}`, { method: 'DELETE' });
      navigate('/');
    }
  };

  if (!dog) return <p>Loading...</p>;

  return (
    <div className="p-4 bg-red-900  max-w-md mx-auto">
      <h2 className="text-xl font-bold mb-4">Dog Details</h2>
      <input
        className="w-full p-2 border mb-2"
        value={form.name || ''}
        onChange={(e) => setForm({ ...form, name: e.target.value })}
        placeholder="Name"
      />
      <input
        className="w-full p-2 border mb-2"
        value={form.type || ''}
        onChange={(e) => setForm({ ...form, type: e.target.value })}
        placeholder="Type"
      />
      <input
        type="number"
        className="w-full p-2 border mb-2"
        value={form.age || ''}
        onChange={(e) => setForm({ ...form, age: Number(e.target.value) })}
        placeholder="Age"
      />
      <select
        className="w-full p-2 border mb-2"
        value={form.status}
        onChange={(e) => setForm({ ...form, status: e.target.value })}
      >
        <option value="available">Available</option>
        <option value="adopted">Adopted</option>
      </select>
      <input
        className="w-full p-2 border mb-4"
        value={form.image || ''}
        onChange={(e) => setForm({ ...form, image: e.target.value })}
        placeholder="Image URL"
      />
      <div className="flex gap-4">
        <button onClick={handleUpdate} className="bg-green-500 text-white px-4 py-2 rounded">
          Update
        </button>
        <button onClick={handleDelete} className="bg-red-500 text-white px-4 py-2 rounded">
          Delete
        </button>
      </div>
    </div>
  );
};

export default Show;
