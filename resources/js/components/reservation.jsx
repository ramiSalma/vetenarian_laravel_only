import React from "react";
import dogBg from './images/bg1.png'; // Replace with your local image path

export default function VeterinaryReservation() {
  return (
    <section className="relative py-16 bg-purple-50 overflow-hidden">
      {/* Background Image */}
      <div
        className="absolute inset-0 bg-cover bg-center opacity-10"
        style={{
          backgroundImage: `url(${dogBg})`,
        }}
      ></div>

      <div className="relative z-10 container mx-auto px-4">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold text-purple-950 mb-2">
            Book a Veterinary Appointment
          </h2>
          <p className="text-purple-500 max-w-xl mx-auto">
            Schedule your pet's next visit with ease. Our professional vets are here to care for your furry companions.
          </p>
        </div>

        <div className="max-w-2xl mx-auto bg-white rounded-xl border border-2 border-purpple-900 shadow-lg p-8">
          <form className="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label className="block text-purple-900 font-medium mb-1">Pet Name</label>
              <input
                type="text"
                placeholder="e.g. Bella"
                className="w-full border border-purple-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
              />
            </div>
            <div>
              <label className="block text-purple-900 font-medium mb-1">Owner Name</label>
              <input
                type="text"
                placeholder="Your name"
                className="w-full border border-purple-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
              />
            </div>
            <div>
              <label className="block text-purple-900 font-medium mb-1">Appointment Date</label>
              <input
                type="date"
                className="w-full border border-purple-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
              />
            </div>
            <div>
              <label className="block text-purple-900 font-medium mb-1">Time</label>
              <input
                type="time"
                className="w-full border border-purple-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
              />
            </div>
            <div className="md:col-span-2">
              <label className="block text-purple-900 font-medium mb-1">Concern / Notes</label>
              <textarea
                rows="4"
                placeholder="Describe any symptoms or concerns..."
                className="w-full border border-purple-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
              ></textarea>
            </div>
          </form>

          <div className="mt-6 text-center">
            <button className="bg-purple-900 text-white py-2 px-6 rounded-full hover:bg-purple-700 transition">
              Reserve Now
            </button>
          </div>
        </div>
      </div>
    </section>
  );
}
