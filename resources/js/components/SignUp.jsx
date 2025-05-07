// import axios from 'axios';
// import api from '../api/axios';
// import React, { useState } from 'react';

// import { useNavigate } from 'react-router-dom';

export default function AdminLogin() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  // const navigate = useNavigate();

  // const handleLogin = async (e) => {
  //   e.preventDefault();
  //   setError('');

  //   try {
  //     await api.get('/sanctum/csrf-cookie', { withCredentials: true });
  //     const response = await api.post('/login', {
  //       email,
  //       password,
  //     },{ withCredentials: true });
  //     console.log('Login success:', response.data);
  //   } catch (error) {
  //     console.error('Login failed:', error);
  //   }
  // };

  return (
    <div className="flex h-screen font-sans">
      {/* Login Form */}
      <div className="w-full md:w-1/2 bg-purple-950 text-white flex flex-col justify-center px-12">
        <div className="max-w-md mx-auto w-full">
          <h2 className="text-3xl font-bold mb-2">Login</h2>
          <p className="text-sm mb-6 text-gray-400">Enter your account details</p>
          <form onSubmit={handleLogin} className="space-y-4">
            <input
              type="email"
              placeholder="Email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              className="w-full bg-transparent p-3 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
              required
            />
            <input
              type="password"
              placeholder="Password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              className="w-full bg-transparent p-3 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
              required
            />
            {error && <p className="text-red-500 text-sm text-center">{error}</p>}
            <button
              type="submit"
              className="w-full bg-purple-600 hover:bg-purple-700 transition text-white py-2 rounded-md"
            >
              Login
            </button>
          </form>
          <div className="mt-6 text-center text-gray-400 text-sm">
            Don’t have an account?{' '}
            <button className="ml-2 text-white bg-purple-700 px-4 py-1 rounded-md">Sign up</button>
          </div>
        </div>
      </div>

      {/* Welcome Panel */}
      <div className="hidden md:flex md:w-1/2 bg-purple-500 items-center justify-center text-white relative">
        <div className="text-center p-8 max-w-md">
          <h1 className="text-4xl font-bold mb-4">Welcome to<br /><span className="text-white">student portal</span></h1>
          <p className="text-sm">Login to access your account</p>
        </div>
        <img
          src="/assets/student-illustration.png"
          alt="Illustration"
          className="absolute bottom-0 right-0 w-1/2"
        />
      </div>
    </div>
  );
}
