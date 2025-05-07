import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

const Create = () => {
  const [form, setForm] = useState({
    name: '',
    type: '',
    age: '',
    status: 'available',
    image: '',
  });

  const navigate = useNavigate();

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    const res = await fetch('http://127.0.0.1:8000/api/dogs', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(form),
    });

    if (res.ok) {
      navigate('/dogs');
    } else {
      alert('Error creating dog');
    }
  };

  return (
    <div className="p-6 max-w-md mx-auto mt-30 bg-white shadow rounded">
      <h2 className="text-xl font-bold mb-4">Create a Dog</h2>
      <form onSubmit={handleSubmit} className="space-y-4">
        <input name="name" onChange={handleChange} value={form.name} placeholder="Name" className="w-full border p-2 rounded" required />
        <input name="type" onChange={handleChange} value={form.type} placeholder="Type" className="w-full border p-2 rounded" required />
        <input name="age" type="number" onChange={handleChange} value={form.age} placeholder="Age" className="w-full border p-2 rounded" required />
        <select name="status" onChange={handleChange} value={form.status} className="w-full border p-2 rounded">
          <option value="available">Available</option>
          <option value="adopted">Adopted</option>
        </select>
        <input name="image" onChange={handleChange} value={form.image} placeholder="Image URL" className="w-full border p-2 rounded" />
        <button type="submit" className="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
      </form>
    </div>
  );
};

export default Create;
