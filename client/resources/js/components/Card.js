import React from 'react';

const Card = ({component}) => {

  const isCoatingDamaged = outcome => {
      if (outcome === 'cd' || outcome === 'cdls') {
          return <span className="inline-block bg-red-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#coatingdamage</span>
      }
  }

  const isLightningDamaged = outcome => {
    if (outcome === 'ls' || outcome === 'cdls') {
        return <span className="inline-block bg-red-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#lightningstrike</span>
    }
  }    

  return (
    <div className="p-10">  
        <div className="max-w-sm rounded overflow-hidden shadow-lg">
            <img className="w-full" src="/turbine.jpg" alt="Turbine" ></img>
            <div className="px-6 py-4">
                <div className="font-bold text-xl mb-2">Component #{component.component_id}</div>
                <p className="text-gray-700 text-base">
                    Some brief details.
                </p>
            </div>
            <div className="px-6 pt-4 pb-2">
            {isCoatingDamaged(component.outcome)}
            {isLightningDamaged(component.outcome)}
            </div>
        </div>
    </div>
  );
};

export default Card;