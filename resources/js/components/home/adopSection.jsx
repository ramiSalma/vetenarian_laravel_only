import React from "react";
import bgcard1 from '../images/bgcard1.png';
import bgcard2 from '../images/bgcard2.png';
import bgcard3 from '../images/bgcard3.png';
import { Link } from 'react-router-dom';
const pets = [
  {
    id: "MK07",
    name: "Bella",
    gender: "Male",
    age: "12 months",
    price: "$800 USD",
    image: bgcard1,
  },
  {
    id: "MO221",
    name: "Nova (Larry)",
    gender: "Male",
    age: "10 months",
    price: "$740 USD",
    image: bgcard2,
  },
  {
    id: "JH45",
    name: "Charlie",
    gender: "Female",
    age: "8 months",
    price: "$720 USD",
    image: bgcard3,
  },
];

export default function AdoptionSection() {
  return (
    <section className="py-16 relative">
      {/* Background image with overlay style */}
      <div className="absolute inset-0 bg-[url('https://media.istockphoto.com/id/1457493367/vector/pet-paw-seamless-pattern-vector-illustration-with-cat-or-dog-paw-on-purple-background.jpg?s=612x612&w=0&k=20&c=K8z84mTmt5chOaJDHvYe3_UF7eXj1ESxsz1Yxg3MCpI=')] bg-repeat opacity-10 z-0" />

      <div className="relative z-10 container mx-auto px-4 text-center">
        <p className="text-purple-500 uppercase tracking-wide text-sm mb-2">Meet the animals</p>
        <h2 className="text-3xl md:text-4xl font-bold text-purple-950">Puppies Waiting for Adoption</h2>
        <p className="text-purple-500 mt-2 max-w-2xl mx-auto mb-12">
          The best-suited dog DNA test to Embark Breed & Health Kit view of Chewy, which provides you with a breed
          breakdown and information about steps.
        </p>

        {/* Cards */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
          {pets.map((pet) => (
            <div
              key={pet.id}
              className="bg-purple-100 p-6 roundedBlop rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center"
            >
              <img
                src={pet.image}
                alt={pet.name}
                className="w-full h-64 object-contain mb-4 mx-auto"
              />
              <h4 className="text-lg font-semibold text-gray-800">
                {pet.id} - {pet.name}
              </h4>
              <p className="text-gray-500 text-sm">Gender: {pet.gender}</p>
              <p className="text-gray-500 text-sm">Age: {pet.age}</p>
              <p className="text-purple-700 font-semibold mt-2">{pet.price}</p>
              <button className="bg-purple-900 text-white mt-4 px-4 py-2 rounded-md hover:bg-purple-700">
                Adopt
              </button>
            </div>
          ))}
        </div>

        {/* Centered button */}
        <div className="mt-12">
          <Link to="/adoption" className="bg-purple-950 text-white font-semibold py-2 px-6 rounded-full shadow hover:bg-purple-800 transition">
            Adopt an Animal
          </Link>
        </div>
      </div>
    </section>
  );
}
