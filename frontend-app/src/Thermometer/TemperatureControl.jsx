import { useContext } from "react";
import { useDispatch, useSelector } from "react-redux";
import MessageContext from "../context/MessageContext";
import { drop, getThermo, rise } from "../store/ThermoSlice";
import './TemperatureControl.css'

function TemperatureControl() {
  const myCtx = useContext(MessageContext);
  const temp = useSelector(getThermo);
  const dispatch = useDispatch();

  const inc = () => {
    if (temp < 30) {
      dispatch(rise(1))
      myCtx.success('The temperature has increased!');
    }
    else {
      myCtx.ligth();
    }

  }

  const dec = () => {
    if (temp > 0) {
      dispatch(drop(1))
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
        <button onClick={inc}>+</button>
        <button onClick={dec}>-</button>
      </div>
    </div>
  )
}

export default TemperatureControl;