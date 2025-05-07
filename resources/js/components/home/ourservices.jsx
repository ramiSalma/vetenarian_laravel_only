import React from "react";
import icon3 from '../images/icon3.png'
import icon4 from '../images/icon4.png'

const OurServices = () => {
  const services = [
    {
      title: "Pet Emergency Care",
      icon: icon3,
      description:
        "Our experienced team is equipped to handle a wide range of urgent health issues to give your pet the best possible treatment in critical situations.",
    },
    {
      title: "Pet ElectrocardiographyServices",
      icon: icon4,
      description:
        "effectively diagnoses and monitors your pet’s heart through our state-of-the-art electrocardiography.",
    },
    {
      title: " Individualized  Control Programs",
      icon: icon4,
      description:
        "pet individualized flea control programs keep your companion free of parasites, protecting them from annoying itches and more serious complications.",
    },
  ];

  return (
    <section className=" py-16 relative">
      {/* Paw Print Background */}
      <div className="absolute bg-gray-950 inset-0 bg-[url('https://media.istockphoto.com/id/1457493367/vector/pet-paw-seamless-pattern-vector-illustration-with-cat-or-dog-paw-on-purple-background.jpg?s=612x612&w=0&k=20&c=K8z84mTmt5chOaJDHvYe3_UF7eXj1ESxsz1Yxg3MCpI=')] opacity-15 bg-repeat z-0" />

      <div className="container mx-auto px-4 relative z-10 text-center">
        <h2 className="text-3xl md:text-4xl text-purple-950 font-bold mb-4">Our Services</h2>
        <p className="text-gray-600 text-purple-500 max-w-xl mx-auto mb-12">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
        </p>

        <div className="flex justify-around px-[100px]">
          {services.map((service, index) => (
            <div
              key={index}
              className="flex flex-col items-center w-[300px] text-center "
            >
              <div className="bg-purple-950 text-white overflow-hidden rounded-full w-34 h-34 flex roundedBlop items-center justify-center text-4xl mb-6 shadow-lg">
                <img src={service.icon} className="w-29" alt="" />
              </div>
              <h3 className="font-semibold text-purple-950 text-lg mb-2">{service.title}</h3>
              <p className="text-gray-600 text-purple-500 text-[13px]">{service.description}</p>
            </div>
          ))}
        </div>

        <div className="mt-12">
          <button className="bg-purple-950 text-white font-semibold py-2 px-6 rounded-full shadow hover:bg-purple-900 transition">
            Read More
          </button>
        </div>
      </div>
    </section>
  );
};

export default OurServices;
