import {
  IonItemGroup,
  IonSelect,
  IonSelectOption,
  IonLabel,
  IonItem,
  IonInput,
  IonTextarea
} from '@ionic/react';

import React, { useState, useEffect } from 'react';

const Measurement: React.FC = ({
  collapse
}:any) => {
  const [measurementTypes, setMeasurementTypes]: any = useState();

  console.log('collapse', collapse);

  useEffect(() => {
    setMeasurementTypes([
      {
        type: 'sausage'
      },
      {
        type: 'mash'
      },
      {
        type: 'gravy'
      }
    ]);
  }, []);

  return (
    <IonItemGroup>
      {measurementTypes && measurementTypes.length && (
        <IonItem>
          <IonLabel position="stacked">Item</IonLabel>
          <IonSelect>
            {measurementTypes.map(({ type }: any, i: number) => {
              return <IonSelectOption key={i}>{type}</IonSelectOption>;
            })}
          </IonSelect>
        </IonItem>
      )}
      <IonItem>
        <IonLabel position="stacked">Count</IonLabel>
        <IonInput type="number" />
      </IonItem>
      <IonItem>
        <IonLabel position="stacked">Weight (grams)</IonLabel>
        <IonInput type="number" />
      </IonItem>
      <IonItem>
        <IonTextarea placeholder="Enter more information here..."></IonTextarea>
      </IonItem>
    </IonItemGroup>
  );
};

export default Measurement;
