import { useState } from "react";
import './TemperatureControl.css'

function TemperatureControl() {
  const [temp, setTemp] = useState(10);

  const rise = () => {
    temp < 30 && setTemp(temp + 1);
  }
  const drop = () => {
    temp > 0 && setTemp(temp - 1);
  }

  return (
    <div className="app-container">
      <div className="temperature-display-container">
        <div className={`temperature-display ${temp >= 15 ? " hot" : " cold"}`}  >
          {temp}°C
        </div>
      </div>
      <div className="button-container">
        <button onClick={rise}>+</button>
        <button onClick={drop}>-</button>
      </div>
    </div>
  )
}

export default TemperatureControl;