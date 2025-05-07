import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';

const Edit = () => {
  const { id } = useParams();
  const navigate = useNavigate();

  const [form, setForm] = useState({
    name: '',
    type: '',
    age: '',
    status: 'available',
    image: '',
  });

  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetch(`http://127.0.0.1:8000/api/dogs/${id}`)
      .then((res) => res.json())
      .then((data) => {
        setForm(data);
        setLoading(false);
      })
      .catch(() => alert('Error fetching dog'));
  }, [id]);

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    const res = await fetch(`http://127.0.0.1:8000/api/dogs/${id}`, {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(form),
    });

    if (res.ok) {
      navigate('/dogs');
    } else {
      alert('Error updating dog');
    }
  };

  if (loading) return <p className="text-center mt-10">Loading...</p>;

  return (
    <div className="p-6 max-w-md mx-auto bg-white shadow rounded">
      <h2 className="text-xl font-bold mb-4">Edit Dog</h2>
      <form onSubmit={handleSubmit} className="space-y-4">
        <input name="name" onChange={handleChange} value={form.name} placeholder="Name" className="w-full border p-2 rounded" required />
        <input name="type" onChange={handleChange} value={form.type} placeholder="Type" className="w-full border p-2 rounded" required />
        <input name="age" type="number" onChange={handleChange} value={form.age} placeholder="Age" className="w-full border p-2 rounded" required />
        <select name="status" onChange={handleChange} value={form.status} className="w-full border p-2 rounded">
          <option value="available">Available</option>
          <option value="adopted">Adopted</option>
        </select>
        <input name="image" onChange={handleChange} value={form.image} placeholder="Image URL" className="w-full border p-2 rounded" />
        <button type="submit" className="bg-green-600 text-white px-4 py-2 rounded">Update</button>
      </form>
    </div>
  );
};

export default Edit;
