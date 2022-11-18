import { useContext, useState } from "react";
import MessageContext from "../context/MessageContext";
import './TemperatureControl.css'

function TemperatureControl() {

  const [temp, setTemp] = useState(0);
  const myCtx = useContext(MessageContext);


  const rise = () => {
    if (temp < 30) {
      setTemp(temp + 1);
      myCtx.success('The temperature has increased!');
    }
    else {
      myCtx.ligth();
    }

  }

  const drop = () => {
    if (temp > 0) {
      setTemp(temp - 1);
      myCtx.success('The temperature has decreased!');
    }
    else {
      myCtx.ligth();
    }
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